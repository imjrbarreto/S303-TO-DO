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


    
}
?>