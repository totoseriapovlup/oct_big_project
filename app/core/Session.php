<?php


namespace app\core;


class Session
{
    static function getUser(){
        session_start();
        if(empty($_SESSION['user'])){
            return null;
        }
        return $_SESSION['user'];
    }

    static public function setUser(array $user){
        session_start();
        $_SESSION['user'] = $user;
    }

    static public function setErrors(array $errors){
        session_start();
        $_SESSION['errors'] = $errors;
    }

    static public function getErrors(){
        session_start();
        if(empty($_SESSION['errors'])){
            return [];
        }
        $errors = $_SESSION['errors'];
        unset($_SESSION['errors']);
        return $errors;
    }

}