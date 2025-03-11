<?php


namespace app\controllers;


use app\core\Route;

class AuthController extends \app\core\AbstractController
{
    public function __construct()
    {
        parent::__construct();
        //TODO create UserModel object
        //$this->model = new UserModel();
    }

    /**
     * Show login form
     * @throws \Exception
     */
    public function index()
    {
        $this->response->view('auth', [
            'title' => 'Log in',
            'content' => 'Hi',
            'action' => Route::url('auth', 'login'),
        ]);
    }

    /**
     * Login logic and redirect
     */
    public function login(){
        echo 'login proc';
        var_dump($_POST);
    }
}