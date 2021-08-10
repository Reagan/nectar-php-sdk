<?php

namespace Nectar\Php\Sdk\Models;

use Nectar\Php\Sdk\Utils\Payload;

abstract class Base
{
    protected $key;
    protected $secret;

    const BASE_PATH = "https://api.nectar.software";
    const CONTENT_TYPE = "application/json";

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    protected function post(string $path, Payload $payload) : string {
        $params = $this->initializeRequest('POST', $path, '', $payload);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $params['url']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params['content']);
        $output =  curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    protected function get(string $path, String $pathArgs = null) : string {
        $params = $this->initializeRequest('GET', $path, $pathArgs, null);
        $ch = curl_init();
        curl_setopt($ch,CURLOPT_URL, $params['url']);
        curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    protected function put(string $path, string $pathArgs = null, Payload $payload = null) : string {
        $params = $this->initializeRequest('PUT', $path, $pathArgs, $payload);
        $ch = curl_init($params['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params['content']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    protected function delete(string $path, string $pathArgs = null, array $payload = null): string {
        $params = $this->initializeRequest('DELETE', $path, $pathArgs, $payload);
        $ch = curl_init($params['url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS,$params['content']);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $params['headers']);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }

    protected function createPayload(array $params) : Payload {
        return new Payload($params);
    }

    private function generateHMAC(string $secret, string $method, string $path, 
                                    string $content, string $contentType, 
                                    string $date, string $nonce) {
        $str  = strtoupper($method) . $path . strtoupper(md5($content)) . $contentType . $date . $nonce;
        $hashed = hash_hmac('sha256', $str, $secret);
        return base64_encode($hashed);
    }

    private function generateRandomNonce(int $length=16) {
        return bin2hex(openssl_random_pseudo_bytes($length));
    }

    private function initializeRequest(string $method, string $path,
                                       string $pathArgs = null, Payload $payload = null): array {
        $content = !is_null($payload) ? $payload->to_json() : '';
        $date = date('D, j M Y G:i:s T');
        $nonce = $this->generateRandomNonce();
        $hmac = $this->generateHMAC($this->secret, $method, $path, $content, self::CONTENT_TYPE, $date, $nonce);
        $headers = $this->generateHeaders($hmac, $content, $date, $nonce);

        if (!is_null($pathArgs))
            $url = sprintf("%s%s?%s", self::BASE_PATH, $path, $pathArgs);
        else
            $url = sprintf("%s%s", self::BASE_PATH, $path);

        return [
            'url' => $url,
            'content' => $content,
            'headers' => $headers
        ];
    }

    private function generateHeaders(string $hmac, string $content, string $date, string $nonce) : array {
        return [
            'Authorization: nectar ' . $this->key . ':' . $hmac,
            'Content-Type: ' . self::CONTENT_TYPE,
            'Content-MD5: ' . strtoupper(md5($content)),
            'Date: ' . $date,
            'nonce: ' . $nonce,
            'User-Agent: nectar-php-sdk'
        ];
    }
}