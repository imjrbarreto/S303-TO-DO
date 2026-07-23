<?php

require_once 'app/models/JsonStorage.php';
require_once 'app/models/ToDoModel.php';

class ToDoController extends Controller
{
    public function __construct()
    {
        $this->storage = new JsonStorage(ROOT_PATH . 'info.json');
        $this->todoModel = new ToDoModel($this->storage);
    }

    public function indexAction()
    {
        $tasks = $this->todoModel->getTasks();
        $this->view->tasks = $tasks; //se envía a la vista
    }





}
?>