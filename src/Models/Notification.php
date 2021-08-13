<?php

namespace Nectar\Php\Sdk\Models;

class Notification extends Base
{

    const NOTIFICATIONS_PATH = "/v1/notifications";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function getNotifications()
    {
        return $this->get(self::NOTIFICATIONS_PATH, "");
    }

    public function setNotificationReadStatus(string $ref, bool $status, float $timestamp)
    {
        $params = array();
        $params['notification_ref'] = $ref;
        $params['status'] = $status;
        $params['timestamp'] = $timestamp;
        var_dump($params);

        return $this->put(self::NOTIFICATIONS_PATH, "", $this->createPayload($params));
    }
}