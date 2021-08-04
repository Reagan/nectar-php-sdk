<?php

namespace Nectar\Php\Sdk\Models;

class Keywords extends Base
{
    const KEYWORDS_PATH = "/v1/keywords";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getKeywords()
    {
        return $this->get(self::KEYWORDS_PATH);
    }

    public function createKeywords(array $keywords, string $confirmationUrl, string $env)
    {
        $payload = $this->createPayload($this->createKeywordsParams($keywords, $confirmationUrl, $env));
        return $this->post(self::KEYWORDS_PATH, $payload);
    }

    public function deleteKeyword(string $keywordRef)
    {
        $endpoint = sprintf("%s/%s", self::KEYWORDS_PATH, $keywordRef);
        return $this->delete($endpoint);
    }

    private function createKeywordsParams(array $keywords, string $confirmationUrl, string $env)
    {
        $params = array();
        $params["keywords"] = implode(",", $keywords);
        $params["confirmation_url"] = $confirmationUrl;
        $params["env"] = $env;
        return $params;
    }
}