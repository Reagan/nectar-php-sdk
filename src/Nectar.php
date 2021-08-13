<?php

namespace Nectar\Php\Sdk;

use Nectar\Php\Sdk\Models\Token;
use Nectar\Php\Sdk\Models\User;
use Nectar\Php\Sdk\Models\PublicKey;
use Nectar\Php\Sdk\Models\Notification;
use Nectar\Php\Sdk\Models\Credits;
use Nectar\Php\Sdk\Models\Credentials;
use Nectar\Php\Sdk\Models\Configuration;

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

    public function getTokensFactory() {
        return new Token($this->key, $this->secret);
    }

    public function getUserFactory() {
        return new User($this->key, $this->secret);
    }

    public function getPublicKeysFactory() {
        return new PublicKey($this->key, $this->secret);
    }

    public function getNotificationsFactory() {
        return new Notification($this->key, $this->secret);
    }

    public function getCreditsFactory() {
        return new Credits($this->key, $this->secret);
    }

    public function getCredentialsFactory() {
        return new Credentials($this->key, $this->secret);
    }

    public function getConfigurationsFactory() {
        return new Configuration($this->key, $this->secret);
    }

}