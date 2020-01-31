<?php

use App\Route;
use App\Controller\HomeController;
use App\Controller\RegisterController;
use App\Controller\LoginController;
use App\Controller\TaskController;
use App\Repositories\TaskRepository;

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
}, 'post');

Route::add('/logout', function () {
    $loginCtrl = new LoginController();
    $loginCtrl->logout();
});

Route::add('/tasks', function () {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->allTasks();
});

Route::add('/task', function () {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->newTask();
});

Route::add('/task_create', function () {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->createTask();
}, 'post');

Route::add('/task/([0-9]*)/edit', function ($taskId) {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->editTask($taskId);
});

Route::add('/task_update', function () {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->updateTask();
}, 'post');

Route::add('/task/([0-9]*)/view', function ($taskId) {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->viewTask($taskId);
});

Route::add('/task/([0-9]*)/delete', function ($taskId) {
    $taskCtrl = new TaskController(new TaskRepository());
    $taskCtrl->deleteTask($taskId);
});

Route::run('/');
