<?php

namespace Bees\Php\Sdk;

use Bees\Php\Sdk\Models\User;
use Bees\Php\Sdk\Models\Banks;
use Bees\Php\Sdk\Models\Account;
use Bees\Php\Sdk\Models\Credentials;
use Bees\Php\Sdk\Models\Keywords;
use Bees\Php\Sdk\Models\STKPushTransactions;
use Bees\Php\Sdk\Models\C2BTransactions;

class Bees
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

    public function getBanksFactory() {
        return new Banks($this->key, $this->secret);
    }

    public function getAccountFactory() {
        return new Account($this->key, $this->secret);
    }

    public function getCredentialsFactory() {
        return new Credentials($this->key, $this->secret);
    }

    public function getKeywordsFactory() {
        return new Keywords($this->key, $this->secret);
    }

    public function getSTKPushTransactionsFactory() {
        return new STKPushTransactions($this->key, $this->secret);
    }

    public function getC2BTransactionsFactory() {
        return new C2BTransactions($this->key, $this->secret);
    }
}