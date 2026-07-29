<?php

class ToDoModel 
{
    private StorageInterface $storage;
    private array $data;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage; 
        $this->data = $this->storage->read();
    }

    public function addTask($name, $description, $owner)
    {
 
        $newData = [
            "id" => uniqid(),
            "name" => $name, 
            "description" => $description,
            "status" => 'pendiente',
            "owner" => $owner,
            "startDate" => (new DateTime())->format('Y-m-d H:m:s'),
            "endDate" => NULL
        ];

        $this->data[] = $newData;

        $this->storage->write($this->data);
    }

    public function getTasks()
    {
        return $this->storage->read();
    }

    public function showTask(string $id)
    {
  
        foreach ($this->data as $key => $task)
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
        foreach ($this->data as $key => $task) {
            if ($task['id'] == $id) {
                unset($this->data[$key]);
                break;
            }
        }
        $this->data = array_values($this->data);
        $this->storage->write($this->data);
    }

         public function editTask($id)
    {
        foreach($this->data as $key => $task)
            {
                if ($task['id'] == $id)
                {
                    return $task;
                }
            }
    } 
    
}
?>