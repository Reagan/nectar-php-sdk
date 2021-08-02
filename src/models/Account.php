<?php

namespace Bees\Php\Sdk\Models;

class Account extends Base
{

    const ACCOUNTS_PATH = "/v1/account";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function createAccount(string $bankRef, string $accountNo)
    {
        $payload = $this->createPayload($this->createAccountParams($bankRef, $accountNo));
        return $this->post(self::ACCOUNTS_PATH, $payload);
    }

    public function getAccount(string $accountRef)
    {
        $pathArgs = sprintf("ref=%s", $accountRef);
        return $this->get(self::ACCOUNTS_PATH, $pathArgs);
    }

    public function updateAccount(string $accountRef, string $bankRef, string $accountNo)
    {
        $payload = $this->createPayload($this->createUpdateAccountParams($accountRef, $bankRef, $accountNo));
        return $this->put(self::ACCOUNTS_PATH, null, $payload);
    }

    public function deactivateAccount(string $accountRef)
    {
        $pathArgs = sprintf("account_ref=%s", $accountRef);
        return $this->delete(self::ACCOUNTS_PATH, $pathArgs);
    }

    private function createAccountParams(string $bankRef, string $accountNo): array
    {
        $params = array();
        $params['bank_ref'] = $bankRef;
        $params['account_no'] = $accountNo;
        return $params;
    }

    private function createUpdateAccountParams(string $accountRef, string $bankRef, string $accountNo): array
    {
        $params = array();
        $params['account_ref'] = $accountRef;
        return array_merge($params, $this->createAccountParams($bankRef, $accountNo));
    }
}