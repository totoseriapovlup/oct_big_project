<?php


namespace app\core;


class Translate
{
    static public function getText(string $key){
        $lang = LANG;
        $path = '../app/languages/' . $lang . '/text.php';
        //TODO create default lang or exception if $lang file not exists
        $texts = include $path;
        if(!array_key_exists($key, $texts)){
            return $key;
        }
        return $texts[$key];
    }
}