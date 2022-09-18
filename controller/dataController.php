<?php

class dataController
{

    public $sql;

    public function __construct($sql){
        $this->sql=$sql;
    }

    public function connect(){
        $connectionClass= new connection();
        $connection= $connectionClass->connection();
        return $connection;
    }

    public function sql(){
        return $this->sql;
    }

}