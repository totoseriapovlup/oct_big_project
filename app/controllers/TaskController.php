<?php


namespace app\controllers;


use app\core\Response;
use app\core\Route;
use app\core\Session;
use app\core\Translate;
use app\models\TaskModel;

class TaskController extends \app\core\AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new TaskModel();
    }

    public function index()
    {
        $this->response->view('task_index', [
            'title' => Translate::getText('task_title'),
            'tasks' => $this->model->all(),
        ]);
    }

    public function create(){
        $this->response->view('task_create', [
            'title' => Translate::getText('task_title_create'),
            'action' => Route::url('task', 'add'),
            'errors' => Session::getErrors(),
        ]);
    }

    public function add($request){
        $task['name'] = $request->name;
        //TODO validate
        $this->model->add($task);
        $this->response->redirect(Route::url('task'));
    }
}