<?php

namespace Nectar\Php\Sdk\Models;

class Credits extends Base
{

    const CREDITS_PATH = "/v1/credits";
    const TRANSACTIONS_PATH = "/v1/transactions";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getCredits()
    {
        return $this->get(self::CREDITS_PATH, "");
    }

    public function getTransactions() 
    {
        return $this->get(self::TRANSACTIONS_PATH, "");
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