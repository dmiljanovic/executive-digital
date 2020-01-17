<?php

namespace App\Repositories;

use App\Database\Db;

/**
 * Class TaskRepository
 * @package App\Repositories
 */
class TaskRepository extends Db
{
    /**
     * Method for getting all tasks.
     *
     * @return array
     */
    public function getTasks()
    {
        return self::getData('SELECT * FROM tasks');
    }

    /**
     * Method for storing new task in db.
     *
     * @param array $data
     * @return bool
     */
    public function createTask($data)
    {
        $param = [
            'title'         => $data['title'],
            'description'   => $data['description'],
            'due_date'      => date('Y-m-d',strtotime($data['due_date'])),
            'col'           => $data['col'],
            'blocked'       => $data['blocked']
        ];

        return self::saveData('
            INSERT INTO tasks (
                title, 
                description, 
                due_date,
                col,
                blocked
            ) 
            VALUES (
            :title,
            :description,
            :due_date,
            :col,
            :blocked
            )', $param
        );
    }

    /**
     * Method for querying db and getting task object by task id.
     *
     * @param int $taskId
     * @return array
     */
    public function getTask($taskId)
    {
        $param = [
            'id' => $taskId
        ];

        return self::getObject('SELECT * FROM tasks WHERE id = :id', $param);
    }

    /**
     * Method for updating existing task record in db.
     *
     * @param array $data
     * @return bool
     */
    public function updateTask($data)
    {
        $param = [
            'title'         => $data['title'],
            'description'   => $data['description'],
            'due_date'      => date('Y-m-d',strtotime($data['due_date'])),
            'col'           => $data['col'],
            'blocked'       => $data['blocked'],
            'id'            => $data['id']
        ];

        return self::saveData('
            UPDATE tasks 
            SET title=:title, description=:description, due_date=:due_date, col=:col, blocked=:blocked 
            WHERE id=:id
            ', $param
        );
    }
}
