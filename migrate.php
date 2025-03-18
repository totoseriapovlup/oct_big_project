<?php

chdir('public');
include_once 'app/bootstrap.php';

class Migrate extends \app\core\AbstractModel{

    public function __construct()
    {
        parent::__construct();
        $query = "CREATE TABLE tasks (id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, name varchar(255) NOT NULL);";
        if($this->db->query($query)){
            echo "tasks table created\n";
        }else{
            echo 'Some problems tasks table creating ' . $this->db->error;
        }
        $query = "CREATE TABLE users (id int UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY, login varchar(80) NOT NULL UNIQUE, password varchar(255) NOT NULL);";
        if($this->db->query($query)){
            echo "users table created\n";
        }else{
            echo 'Some problems with users table creating ' . $this->db->error;
        }
    }
}

new Migrate();