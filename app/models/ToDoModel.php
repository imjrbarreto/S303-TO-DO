<?php

require_once 'app/models/StorageInterface.php';

class ToDoModel 
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage;
    } 

    public function getTasks()
    {
        return $this->storage->read();
    }



}
?>