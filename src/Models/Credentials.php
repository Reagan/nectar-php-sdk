<?php

namespace Nectar\Php\Sdk\Models;

class Credentials extends Base
{

    const CREDENTIALS_PATH = "/v1/credentials";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getCredentials(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->get(self::CREDENTIALS_PATH, $pathArgs);
    }

    public function activateCredentials(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->put(self::CREDENTIALS_PATH, $pathArgs, null);
    }

    public function deactivateCredentials(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->delete(self::CREDENTIALS_PATH, $pathArgs);
    }

}