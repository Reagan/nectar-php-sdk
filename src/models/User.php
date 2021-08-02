<?php

namespace Bees\Php\Sdk\Models;

class User extends Base
{
    const USER_PATH = "/v1/user";

    public function __construct(string $key, string $secret)
    {
        parent::__construct($key, $secret);
    }

    public function createUser(string $firstName, string $lastName, string $username,
                               string $password, string $phoneNo, string $email, string $imageUrl): string
    {
        $payload = $this->createPayload($this->createUserParams($firstName, $lastName, $username, $password, $phoneNo, $email, $imageUrl));
        return $this->post(self::USER_PATH, $payload);
    }

    public function getUser(string $username): string
    {
        $pathArgs = sprintf("username=%s", $username);
        return $this->get(self::USER_PATH, $pathArgs);
    }

    public function updateUser(string $ref, string $firstName, string $lastName, string $username,
                               string $password, string $phoneNo, string $email, string $imageUrl): string
    {
        $payload = $this->createPayload($this->createUpdateUserParams($ref, $firstName, $lastName, $username,
            $password, $phoneNo, $email, $imageUrl));
        return $this->put(self::USER_PATH, null, $payload);
    }

    public function deleteUser(string $userRef): string
    {
        $pathArgs = sprintf("ref=%s", $userRef);
        return $this->delete(self::USER_PATH, $pathArgs);
    }


    private function createUserParams(string $firstName, string $lastName, string $username,
                                      string $password, string $phoneNo, string $email, string $imageUrl): array
    {
        $params = array();
        $params['first_name'] = $firstName;
        $params['last_name'] = $lastName;
        $params['username'] = $username;
        $params['password'] = $password;
        $params['phone_no'] = $phoneNo;
        $params['email'] = $email;
        $params['image_url'] = $imageUrl;
        return $params;
    }

    private function createUpdateUserParams(string $ref, string $firstName, string $lastName, string $username,
                                            string $password, string $phoneNo, string $email, string $imageUrl): array
    {
        $params = array();
        $params['ref'] = $ref;
        $userParams = $this->createUserParams($firstName, $lastName, $username, $password, $phoneNo, $email, $imageUrl);
        array_merge($params, $userParams);
        return array_merge($params, $userParams);
    }
}