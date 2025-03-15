<?php


namespace app\core;


class Auth
{
    /**
     * Check current user guest or no
     * @return bool
     */
    static public function guest(){
        return !(bool)self::getUser();
    }

    static function getUser(){
        Session::getItem('user');
    }

    static public function setUser(array $user){
        Session::setItem('user', $user);
    }
}