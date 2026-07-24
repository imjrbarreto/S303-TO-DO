<?php

class ToDoModel 
{
    private StorageInterface $storage;

    public function __construct(StorageInterface $storage)
    {
        $this->storage = $storage; 
    }

}
?>