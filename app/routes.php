<?php

use App\Route;
use App\Controller\HomeController;
use App\Controller\RegisterController;
use App\Controller\LoginController;
use App\Controller\TaskController;

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
    $loginCtrl = new LoginController();
    $loginCtrl->show();
});

Route::add('/logging_in', function () {
    $loginCtrl = new LoginController();
    $loginCtrl->loggingIn();
});

Route::add('/logout', function () {
    $loginCtrl = new LoginController();
    $loginCtrl->logout();
});

Route::add('/task', function () {
    $taskCtrl = new TaskController();
    $taskCtrl->allTasks();
});

Route::run('/');
