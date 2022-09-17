<?php

class connect
{
    function connect()
    {
        $conn = mysqli_connect('localhost', 'root', 'berkeanna');
        return $conn;
    }

}