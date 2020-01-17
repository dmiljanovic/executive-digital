<?php

namespace App\Repositories;

use App\Database\Db;

/**
 * Class LoginRepository
 * @package App\Repositories
 */
class LoginRepository extends Db
{
    /**
     * Method for getting user.
     *
     * @param array $data
     * @return array
     */
    public function getUser($data)
    {
        return self::getObject('
            SELECT * FROM users WHERE email=:email AND password=:password AND confirmed=:confirmed',
            $data
        );
    }
}
