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
            Analog::log('Error while fetching user from db: ' . $exception);
            header("location: tasks");
            flash()->error('Error while fetching user from db. Please contact your admin.');
        }

        if ($user) {
            Session::SetKey("userId", $user->id);
            Session::SetKey("userEmail", $user->email);

            header("location: tasks");
            flash()->success('Successfully logged!');
        } else {
            header("location: login");
            flash()->info('Ther is no user with provided credentials!');
        }
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
        $data['password']   = hash('sha256',Validation::sanitizeData($_REQUEST['password']));
        $data['confirmed']  = 1;

        return $data;
    }

    /**
     * Method for logging out a user.
     */
    public function logout()
    {
        header("location: login");
        flash()->success('Successfully logged out!');
        session_destroy();
    }
}
