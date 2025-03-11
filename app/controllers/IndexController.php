<?php


namespace app\controllers;


use app\core\Auth;
use app\core\Route;

class IndexController extends \app\core\AbstractController
{
    /**
     * Redirect to tasks or login form
     */
    public function index()
    {
        if(Auth::guest()){
            $this->response->redirect(Route::url('auth'));
        }else{
            $this->response->redirect(Route::url('task'));
        }
    }
}