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
     * Method for getting all tasks.
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
}
