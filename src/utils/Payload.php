<?php

namespace Nectar\Php\Sdk\Utils;

class Payload
{
    private $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    public function to_json() {
        return json_encode($this->params);
    }
}