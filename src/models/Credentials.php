<?php

namespace Bees\Php\Sdk\Models;

class Credentials extends Base
{
    const CREDENTIALS_PATH = "/v1/credentials";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getCredentials()
    {
        return $this->get(self::CREDENTIALS_PATH);
    }

    public function activateCredentials(string $credentialsRef)
    {
        $path = sprintf("%s/%s/activate", self::CREDENTIALS_PATH, $credentialsRef);
        return $this->put($path);
    }

    public function deactivateCredentials(string $credentialsRef)
    {
        $path = sprintf("%s/%s/deactivate", self::CREDENTIALS_PATH, $credentialsRef);
        return $this->put($path);
    }
}