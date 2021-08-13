<?php

namespace Nectar\Php\Sdk\Models;

class PublicKey extends Base
{

    const PUBLIC_KEYS_PATH = "/v1/public_keys";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function createPublicKey(string $name, string $key, bool $activated)
    {
        $payload = $this->createPayload($this->createPublicKeyParams($name, $key, $activated));
        return $this->post(self::PUBLIC_KEYS_PATH, $payload);
    }

    public function getPublicKeys(bool $activated)
    {
        $pathArgs = sprintf("activated=%b", $activated);
        return $this->get(self::PUBLIC_KEYS_PATH, $pathArgs);
    }

    public function activatedPublicKey(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->put(self::PUBLIC_KEYS_PATH, $pathArgs, null);
    }

    public function deactivatePublicKey(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->delete(self::PUBLIC_KEYS_PATH, $pathArgs);
    }

    private function createPublicKeyParams(string $name, string $key, bool $activated): array
    {
        $params = array();
        $params['name'] = $name;
        $params['key'] = $key;
        $params['activated'] = $activated;
        return $params;
    }
}