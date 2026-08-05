<?php


class TodoController extends Controller
{
    private ToDoModel $todoModel;
    private JsonStorage $storage;
    private ValidatorController $validator;
    
    public function __construct()
    {
        $this->storage = new JsonStorage(ROOT_PATH . '/info.json');
        $this->todoModel = new ToDoModel($this->storage);
        $this->validator = new ValidatorController();
    }

    public function indexAction()
    {
        $tasks = $this->todoModel->getTasks();
        $this->view->tasks = $tasks;
    }

    public function createAction() {}

    public function addAction()
    {
        $name = htmlspecialchars($this->_getParam("name"));
        $description = htmlspecialchars($this->_getParam("description"));
        $owner = htmlspecialchars($this->_getParam("owner"));

        $errors = $this->validator->validateData($name,$description,$owner);
        if(empty($errors))
            {
                $this->todoModel->addTask($name, $description, $owner);
                header('Location: /');
                exit(); 
            }
        else 
            {           
                $this->view->errors = $errors;
                $this->view->name = $name;
                $this->view->description = $description;
                $this->view->owner = $owner;
                $this->view->render('todo/create.phtml');
                exit();
            }

    }

    public function showTaskAction()
    {
        $id = $this->_getParam('id');
        $task = $this->todoModel->showTask($id);
        $this->view->task = $task;
    }

    public function deleteTaskAction()
    {

        $id = $this->_getParam('id');
        $this->todoModel->deleteTask($id);

        header('Location: /');
        exit();
    }

    public function editAction()
    {
        $id = $this->_getParam('id');
        $oldData = $this->todoModel->showTask($id);
        $this->view->task = $oldData;
           
    }

    public function updateAction()
    {
        $id = $this->_getParam('id');

        $updateName = htmlspecialchars($this->_getParam("name"));
        $updateDescription = htmlspecialchars($this->_getParam("description"));
        $updateOwner = htmlspecialchars($this->_getParam("owner"));
        $updateStatus = $this->_getParam("status");

        $errors = $this->validator->validateData($updateName,$updateDescription,$updateOwner);
        
        if(empty($errors))
            {
                $this->todoModel->updateTask($id,$updateName,$updateDescription,$updateOwner,$updateStatus);
                header('Location: /');
                exit();
            }
        else 
            {           
                $this->view->errors = $errors;

                $this->view->task = [
                    'id' => $id,
                    'name' => $updateName,
                    'description' => $updateDescription,
                    'owner' => $updateOwner,
                    'status' => $updateStatus
                ];
                $this->view->render('todo/edit.phtml');
                exit();
            }

    }

}
?>