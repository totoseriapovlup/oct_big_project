<?php


namespace app\core;


class Auth
{
    /**
     * Check current user guest or no
     * @return bool
     */
    static public function guest(){
        return !(bool)Session::getUser();
    }
}