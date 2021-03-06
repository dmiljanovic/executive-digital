<?php

namespace App\Controller;

use Analog\Analog;
use Analog\Handler\File;

/**
 * Class HomeController
 * @package App\Controller
 */
class HomeController extends BaseController
{
    /**
     * HomeController constructor.
     */
    public function __construct()
    {
        Analog::handler(File::init('/tmp/php.log'));
    }

    /**
     * Method for creating index view.
     */
    public function index()
    {
        $this->createView('index');
    }
}
