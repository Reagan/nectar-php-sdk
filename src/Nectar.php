<?php

namespace Nectar\Php\Sdk;

use Nectar\Php\Sdk\Models\User;
use Nectar\Php\Sdk\Models\Banks;
use Nectar\Php\Sdk\Models\Account;
use Nectar\Php\Sdk\Models\Credentials;
use Nectar\Php\Sdk\Models\Keywords;
use Nectar\Php\Sdk\Models\STKPushTransactions;
use Nectar\Php\Sdk\Models\C2BTransactions;

class Nectar
{
    private $key;
    private $secret;

    public function __construct(string $key, string $secret)
    {
        $this->key = $key;
        $this->secret = $secret;
    }

    public function getKey() {
        return $this->key;
    }

    public function getSecret() {
        return $this->secret;
    }

    public function getUserFactory() {
        return new User($this->key, $this->secret);
    }

}