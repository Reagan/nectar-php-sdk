<?php

namespace Bees\Php\Sdk\Models;

class C2BTransactions extends Base
{
    const POLL_C2B_PAYMENTS_PATH = "/v1/transactions";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function pollTransactions(string $paymentStatusType, string $transactionID,
                                     string $callbackUrl, string $env) : string
    {
        $pathParams = $this->createPollTransactionsRequestParams($paymentStatusType, $transactionID, $callbackUrl, $env);
        return $this->get(self::POLL_C2B_PAYMENTS_PATH, $pathParams);
    }

    private function createPollTransactionsRequestParams(string $paymentStatusType, string $transactionID,
                                                         string $callbackUrl, string $env): string
    {
        return sprintf("transaction_id=%s&payment_status_type=%s&callback_url=%s&env=%s",
            $transactionID, $paymentStatusType, $callbackUrl, $env);
    }
}