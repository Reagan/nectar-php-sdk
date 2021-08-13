<?php

namespace Nectar\Php\Sdk\Models;

class Configuration extends Base
{

    const CONFIGURATIONS_PATH = "/v1/configurations";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getConfiguration(string $ref, bool $detailed)
    {
        $pathArgs = sprintf("ref=%s&detailed=%b", $ref, $detailed);
        return $this->get(self::CONFIGURATIONS_PATH, $pathArgs);
    }

    public function activateConfiguration(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->put(self::CONFIGURATIONS_PATH, $pathArgs, null);
    }

    public function deactivateConfiguration(string $ref)
    {
        $pathArgs = sprintf("ref=%s", $ref);
        return $this->delete(self::CONFIGURATIONS_PATH, $pathArgs);
    }

}