<?php

namespace App\Controller;

use Analog\Analog;
use App\Helpers\Session;
use App\Helpers\Validation;
use App\Repositories\LoginRepository;

/**
 * Class LoginController
 * @package App\Controller
 */
class LoginController extends BaseController
{
    /**
     * Show form for login.
     */
    public function show()
    {
        $this->createView('login');
    }

    /**
     * Method for logging in a user.
     */
    public function loggingIn()
    {
        $repo = new LoginRepository();
        $data = $this->prepareDataForLoggingIn();

        try {
            $user = $repo->getUser($data);
        } catch (\Exception $exception) {
            Analog::log('Error while faching user from db: ' . $exception);
            var_dump($exception);
            die();
        }

        if ($user) {
            Session::SetKey("userId", $user->id);
            Session::SetKey("userEmail", $user->email);
        }

        header("location: tasks");
    }

    /**
     * Method for prepare and sanitize data for saving.
     *
     * @return array
     */
    private function prepareDataForLoggingIn()
    {
        $data = [];

        $data['email']      = Validation::sanitizeData($_REQUEST['email']);
        $data['password']   = Validation::sanitizeData($_REQUEST['password']);
        $data['confirmed']  = 1;

        return $data;
    }

    /**
     * Method for logging out a user.
     */
    public function logout()
    {
        session_destroy();
        header("location: login");
    }
}
