<?php

namespace App\Controller;

use Analog\Analog;
use App\Helpers\Validation;
use App\Repositories\TaskRepository;

/**
 * Class TaskController
 * @package App\Controller
 */
class TaskController extends BaseController
{
    /**
     * @var TaskRepository
     */
    private $repo;

    /**
     * TaskController constructor.
     * @param TaskRepository $taskRepository
     */
    public function __construct(TaskRepository $taskRepository)
    {
        $this->repo = $taskRepository;
    }

    /**
     * Method for getting all tasks.
     */
    public function allTasks()
    {
        try {
            $tasks = $this->repo->getTasks();
        } catch (\Exception $exception) {
            Analog::log('Error while fetching all tasks from db: ' . $exception);
            var_dump($exception);
            die();
        }

        $this->createView('tasks', $tasks);
    }

    /**
     * Method for getting creating task form.
     */
    public function newTask()
    {
        $this->createView('task_create');
    }

    /**
     * Method for creating new task.
     */
    public function createTask()
    {
        $data = $this->prepareData();

        try {
            $this->repo->createTask($data);
        } catch (\Exception $exception) {
            Analog::log('Error while fetching all tasks from db: ' . $exception);
            var_dump($exception);
            die();
        }

        header("location: tasks");
    }

    /**
     * Method for prepare and sanitize data for saving.
     *
     * @return array
     */
    private function prepareData()
    {
        $data = [];

        if (isset($_REQUEST['id'])) {
            $data['id'] = Validation::sanitizeData($_REQUEST['id']);
        }

        $data['title']          = Validation::sanitizeData($_REQUEST['title']);
        $data['description']    = Validation::sanitizeData($_REQUEST['description']);
        $data['due_date']       = Validation::sanitizeData($_REQUEST['due_date']);;
        $data['col']            = Validation::sanitizeData($_REQUEST['col']);
        $data['blocked']        = isset($_REQUEST['blocked']) ? 1 : 0;

        return $data;
    }

    /**
     * Method for showing edit task form.
     *
     * @param string $taskId
     */
    public function editTask($taskId)
    {
        try {
            $task = $this->repo->getTask((int)$taskId);
        } catch (\Exception $exception) {
            Analog::log('Error while fetching all tasks from db: ' . $exception);
            var_dump($exception);
            die();
        }

        $this->createView('task_edit', $task);
    }

    /**
     * Method for updating task.
     */
    public function updateTask()
    {
        $data = $this->prepareData();

        try {
            $this->repo->updateTask($data);
        } catch (\Exception $exception) {
            Analog::log('Error while fetching all tasks from db: ' . $exception);
            var_dump($exception);
            die();
        }

        header("location: tasks");
    }
}
