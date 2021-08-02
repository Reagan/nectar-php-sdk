<?php

namespace Bees\Php\Sdk\Models;

class STKPushTransactions extends Base
{
    const PROMPT_STK_PAYMENTS_PATH = "/v1/promptSTKPushPayment";
    const POLL_STK_PAYMENTS_PATH = "/v1/stktransactions";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function promptSTKPushPayment(string $paymentType, string $payer,
                                         string $callbackUrl, string $displayedDescription,
                                         string $fullDescription, float $amount,
                                         string $accountRef, string $env) : string
    {
        $payload = $this->createPayload($this->createSTKPushParams($paymentType, $payer, $callbackUrl,
                                                                    $displayedDescription, $fullDescription,
                                                                    $amount, $accountRef, $env));
        return $this->post(self::PROMPT_STK_PAYMENTS_PATH, $payload);
    }

    public function pollSTKPushTransaction(string $paymentStatusType, string $transactionRef) : string
    {
        return $this->get(self::POLL_STK_PAYMENTS_PATH, $this->createPollTransactionsRequestParams($paymentStatusType, $transactionRef));
    }

    private function createSTKPushParams(string $paymentType, string $payer,
                                         string $callbackUrl, string $displayedDescription,
                                         string $fullDescription, float $amount,
                                         string $accountRef, string $env): array
    {
        $params = array();
        $params["payment_type"] = $paymentType;
        $params["payer"] = $payer;
        $params["callback_url"] = $callbackUrl;
        $params["displayed_desc"] = $displayedDescription;
        $params["full_desc"] = $fullDescription;
        $params["amount"] = $amount;
        $params["account_ref"] = $accountRef;
        $params["env"] = $env;
        return $params;
    }

    private function createPollTransactionsRequestParams(string $paymentStatusType, string $transactionRef): string
    {
        return sprintf("payment_status_type=%s&ref=%s",
            $paymentStatusType, $transactionRef);
    }

}