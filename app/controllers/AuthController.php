<?php


namespace app\controllers;


use app\core\Auth;
use app\core\Route;
use app\core\Session;
use app\core\Translate;
use app\models\UserModel;

class AuthController extends \app\core\AbstractController
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new UserModel();
    }

    /**
     * Show login form
     * @throws \Exception
     */
    public function index()
    {
        $this->response->view('auth', [
            'title' => Translate::getText('auth_title'),
            'content' => 'Hi',
            'action' => Route::url('auth', 'login'),
            'errors' => Session::getErrors(),
        ]);
    }

    /**
     * Login logic and redirect
     */
    public function login($request)
    {
        $login = $request->login;
        $password = $request->password;
        //TODO validate
        $user = $this->model->getByLogin($login);
        $validUserCred = true;
        if (!$user) {
            $validUserCred = false;
        }else if (!password_verify($password, $user['password'])) {
            $validUserCred = false;
        }
        if (!$validUserCred) {
            Session::setErrors([Translate::getText('auth_error')]);
            $this->response->redirect(Route::url('auth'));
        }
        Auth::setUser(['login' => $login]);
        $this->response->redirect(Route::url('task'));
    }
}