<?php

class ToDoModel 
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage; 
    }

    public function addTask(string $name, string $description, string $owner)
    {
        $data = $this->storage->read();
        $newData = [
            "id" => uniqid(),
            "name" => $name, 
            "description" => $description,
            "status" => 'pendiente',
            "owner" => $owner,
            "startDate" => (new DateTime())->format('Y-m-d H:m:s'),
            "endDate" => NULL
        ];

        $data[] = $newData;

        $this->storage->write($data);
    }

    public function getTasks()
    {
        return $this->storage->read();
    }

    public function showTask(string $id)
    {
        $data = $this->storage->read();
        foreach ($data as $key => $task)
            {
                if ($task['id'] == $id)
                    {
                        return $task;
                    }
            }
        return null;
    }

    public function deleteTask($id)
    {

        $data = $this->storage->read();
        foreach ($data as $key => $task) {
            if ($task['id'] == $id) {
                unset($data[$key]);
                break;
            }
        }
        $data = array_values($data);
        $this->storage->write($data);
    }
    
}
?>