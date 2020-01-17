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
        $tasks = [];

        try {
            $tasks = $this->repo->getTasks();
        } catch (\Exception $exception) {
            Analog::log('Error while fetching all tasks from db: ' . $exception);
            flash()->error('Error while fetching all tasks from db. Please contact your admin.');
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
            if ($this->repo->createTask($data)) {
                header("location: tasks");
                flash()->success('Successfully created task!');
            }
        } catch (\Exception $exception) {
            Analog::log('Error while storing new record tasks in db: ' . $exception);
            header("location: tasks");
            flash()->error('Error while storing new record tasks in db. Please contact your admin.');
        }
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
            Analog::log('Error while fetching task from db: ' . $exception);
            header("location: ../../tasks");
            flash()->error('Error while fetching task from db. Please contact your admin.');
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
            if ($this->repo->updateTask($data)) {
                header("location: tasks");
                flash()->success('Successfully updated task!');
            }
        } catch (\Exception $exception) {
            Analog::log('Error while updating task in db: ' . $exception);
            header("location: ../../tasks");
            flash()->error('Error while updating task in db. Please contact your admin.');
        }
    }

    /**
     * Method for showing view task.
     *
     * @param string $taskId
     */
    public function viewTask($taskId)
    {
        try {
            $task = $this->repo->getTask((int)$taskId);
        } catch (\Exception $exception) {
            Analog::log('Error while fetching task from db: ' . $exception);
            header("location: ../../tasks");
            flash()->error('Error while fetching task from db. Please contact your admin.');
        }

        $this->createView('task_view', $task);
    }

    /**
     * Method for deleting task.
     *
     * @param string $taskId
     */
    public function deleteTask($taskId)
    {
        try {
            if ($this->repo->deleteTask((int)$taskId)) {
                header("location: ../../tasks");
                flash()->success('Successfully deleted task!');
            }
        } catch (\Exception $exception) {
            Analog::log('Error while deleting task from db: ' . $exception);
            header("location: ../../tasks");
            flash()->error('Error while deleting task from db. Please contact your admin.');
        }
    }
}
