<?php

namespace Nectar\Php\Sdk\Models;

class User extends Base
{
    const USER_PATH = "/v1/users";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function createUser(string $firstName, string $lastName, string $username,
                               string $password, string $phoneNo, string $imageUrl,
                               string $email, bool $activated): string
    {
        $payload = $this->createPayload($this->createUserParams($firstName, $lastName, 
                                                                $username, $password, 
                                                                $phoneNo, $imageUrl,
                                                                $email, $activated));
        return $this->post(self::USER_PATH, $payload);
    }

    public function getUser(): string
    {
        return $this->get(self::USER_PATH, "");
    }

    public function updateUser(string $firstName, string $lastName, string $username,
                               string $password, string $phoneNo, string $imageUrl, 
                               string $email, bool $activated): string
    {
        $payload = $this->createPayload($this->createUserParams($firstName, $lastName, $username,
                                                                $password, $phoneNo, $imageUrl, 
                                                                $email, $activated));
        return $this->put(self::USER_PATH, null, $payload);
    }

    public function deleteUser(string $userRef): string
    {
        return $this->delete(self::USER_PATH, "");
    }


    private function createUserParams(string $firstName, string $lastName, string $username,
                                      string $password, string $phoneNo, string $imageUrl,
                                      string $email, bool $activated): array
    {
        $params = array();
        $params['first_name'] = $firstName;
        $params['last_name'] = $lastName;
        $params['username'] = $username;
        $params['password'] = $password;
        $params['phone_no'] = $phoneNo;
        $params['image_url'] = $imageUrl;
        $params['email'] = $email;
        $params['activated'] = $activated;
        return $params;
    }
}