<?php

class connection
{
    function connection()
    {
        $conn = mysqli_connect('localhost', 'root', 'berkeanna');
        return $conn;
    }

}