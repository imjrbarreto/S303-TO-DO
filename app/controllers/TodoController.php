<?php

class TodoController extends Controller
{

    private ToDoModel $todoModel;
    private JsonStorage $storage;

    public function __construct()
    {
        $this->storage = new JsonStorage(ROOT_PATH .'/info.json');
        $this->todoModel = new ToDoModel($this->storage);
    }

    public function createAction() {}






}
?>