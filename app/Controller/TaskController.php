<?php

namespace App\Controller;

/**
 * Class TaskController
 * @package App\Controller
 */
class TaskController extends BaseController
{
    /**
     * Method for getting all tasks.
     */
    public function allTasks()
    {
        $this->createView('tasks');
    }
}
