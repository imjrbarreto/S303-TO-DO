<?php

class TodoController extends Controller
{
    private ToDoModel $todoModel;
    private JsonStorage $storage;
    
    public function __construct()
    {

        $this->storage = new JsonStorage(ROOT_PATH . '/info.json');
        $this->todoModel = new ToDoModel($this->storage);
    }

    public function indexAction()
    {
        $tasks = $this->todoModel->getTasks();
        $this->view->tasks = $tasks;
    }

    public function createAction() {}

    public function addAction()
    {
        $name = $this->_getParam("name");
        $description = $this->_getParam("description");
        $owner = $this->_getParam("owner");

        $this->todoModel->addTask($name, $description, $owner);

        header('Location: /');
        exit(); 
    }

}
?>