<?php

namespace App\Repositories;

use App\Database\Db;

/**
 * Class RegisterRepository
 * @package App\Repositories
 */
class RegisterRepository extends Db
{
    /**
     * Method for saving user data in db.
     *
     * @param array $data
     * @param string $token
     * @return bool
     */
    public function beginRegistration($data, $token)
    {
        $param = [
            'email'         => $data['email'],
            'password'      => $data['password'],
            'token'         => $token,
            'confirmed'     => 0,
            'created_at'    => date('Y-m-d H:i:s')
        ];

        return self::saveData('
            INSERT INTO users (
                email, 
                password, 
                token,
                confirmed,
                created_at
            ) 
            VALUES (
            :email,
            :password,
            :token,
            :confirmed,
            :created_at
            )', $param
        );
    }

    /**
     * Method for confirming user registration in db.
     *
     * @param string $token
     * @return bool
     */
    public function confirmRegistration($token)
    {
        return self::saveData("
          UPDATE users SET confirmed = 1 WHERE token ='{$token}' AND confirmed = 0
        ");
    }
}
