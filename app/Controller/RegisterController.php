<?php

namespace App\Controller;

use Analog\Analog;
use App\Helpers\Mail;
use App\Helpers\Validation;
use App\Repositories\RegisterRepository;

/**
 * Class RegisterController
 * @package App\Controller
 */
class RegisterController extends BaseController
{
    /**
     * Show form for registration.
     */
    public function show()
    {
        $this->createView('register');
    }

    /**
     * Method for register a user.
     */
    public function beginRegistration()
    {
        $repo = new RegisterRepository();
        $data = $this->prepareDataForSaving();
        $token = md5(time());

        try {
            $res = $repo->beginRegistration($data, $token);
        } catch (\Exception $exception) {
            Analog::log('Error while register user to db: ' . $exception);
            header("location: register");
            flash()->error('Error while register user to db. Please contact your admin.');
        }

        if ($res) {
            $body = "<a href='".($_SERVER["HTTP_HOST"]."/confirm_registration?token=".$token)."'>Please confirm your registration with this link</a>";
            Mail::send($body);

            header("location: login");
            flash()->success('Successfully send confirmation mail. Please check your mail box.');
        }
    }

    /**
     * Method for prepare and sanitize data for saving.
     *
     * @return array
     */
    private function prepareDataForSaving()
    {
        $data = [];

        $data['email']    = Validation::sanitizeData($_REQUEST['email']);
        $data['password'] = Validation::sanitizeData($_REQUEST['password']);

        return $data;
    }

    /**
     * Method for confirming registration.
     */
    public function confirmRegistration()
    {
        $repo = new RegisterRepository();
        $token = Validation::sanitizeData($_REQUEST['token']);

        try {
            if ($repo->confirmRegistration($token)) {
                header("location: login");
                flash()->success('Successfully confirmed user!');
            };
        } catch (\Exception $exception) {
            Analog::log('Error while confirming user to db: ' . $exception);
            header("location: register");
            flash()->error('Error while confirming user to db. Please contact your admin.');
        }
    }
}
