<?php

namespace Bees\Php\Sdk\Models;

class Banks extends Base
{
    const BANKS_PATH = "/v1/banks";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getBanks()
    {
        return $this->get(self::BANKS_PATH);
    }
}