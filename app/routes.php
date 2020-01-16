<?php

use App\Route;
use App\Controller\HomeController;

Route::add('/', function () {
    $homeCtrl = new HomeController();
    $homeCtrl->index();
});

Route::add('/register', function () {
});

Route::add('/login', function () {
});
Route::add('/task', function () {
});

Route::run('/');
