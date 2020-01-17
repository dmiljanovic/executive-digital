<?php

use App\Route;
use App\Controller\HomeController;
use App\Controller\RegisterController;

Route::add('/', function () {
    $homeCtrl = new HomeController();
    $homeCtrl->index();
});

Route::add('/register', function () {
    $registerCtrl = new RegisterController();
    $registerCtrl->show();
});

Route::add('/registration', function () {
    $registerCtrl = new RegisterController();
    $registerCtrl->beginRegistration();
});

Route::add('/confirm_registration', function () {
    $registerCtrl = new RegisterController();
    $registerCtrl->confirmRegistration();
});

Route::add('/login', function () {
});

Route::add('/task', function () {
});

Route::run('/');
