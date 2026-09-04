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
            "status" => status::PENDING,
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

    public function updateTask($id,$name,$description,$owner,$status)
    {
        $validStatus = array_column(status::cases(), 'value');
        if(!in_array($status, $validStatus))
            {
                $status = status::PENDING->value;
            }

        foreach ($this->data as $key => &$task)
            {
                if ($task['id'] == $id) 
                    {
                        $task['name'] = $name;
                        $task['description'] = $description;
                        $task['owner'] = $owner;
                        $task['status'] = $status;
                        if($status == status::COMPLETE->value)
                            {
                                $task['endDate'] = (new DateTime())->format('Y-m-d H:m:s');
                            }
                        break;  
                    }
                    
            }
        
        $this->storage->write($this->data);
    }

    
}
?>