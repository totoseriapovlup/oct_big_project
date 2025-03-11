<?php


namespace app\core;


class Auth
{
    /**
     * Check current user guest or no
     * @return bool
     */
    static public function guest(){
        session_start();
        if(empty($_SESSION['login'])){
            return true;
        }else{
            return false;
        }
    }
}