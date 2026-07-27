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
        if($_SERVER["REQUEST_METHOD"] == "POST")
            
            {
                $name = htmlspecialchars($_POST["name"]);
                $description = htmlspecialchars($_POST["description"]);
                $owner = htmlspecialchars($_POST["owner"]);
            }

        $this->todoModel->addTask($name, $description, $owner);

        header('Location: /');
        exit();
        
    }

    public function showTaskAction()
    {
        $id = $this->_getParam('id');
        $task = $this->todoModel->showTask($id);
        $this->view->task = $task;
    }


}
?>