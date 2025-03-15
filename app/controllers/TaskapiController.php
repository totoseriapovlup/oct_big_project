<?php


namespace app\controllers;


use app\core\Response;
use app\core\Route;
use app\core\Session;
use app\core\Translate;
use app\models\TaskModel;

class TaskapiController extends \app\core\AbstractController
{

    public function __construct()
    {
        parent::__construct();
        $this->model = new TaskModel();
    }

    public function index()
    {
        $this->response->view('taskapi_index', [
            'title' => Translate::getText('task_title'),
        ]);
    }

    public function all(){
        $this->response->json($this->model->all());
    }

    public function add($request){
        var_dump($request);
        $task['name'] = $request->name;
        var_dump($task);
        //TODO validate
        if($this->model->add($task)){
            $this->response->status(201);
        }else{
            $this->response->status(500);
        }
    }
}