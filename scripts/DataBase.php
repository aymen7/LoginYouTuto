<?php

/**
 * Created by PhpStorm.
 * User: user
 * Date: 12/11/2017
 * Time: 15:57
 */
class DataBase
{

    /**
     * DataBase constructor.
     * @param $servername
     * @param $db
     * @param $username
     * @param $password
     */
    public function __construct($servername, $db, $username, $password)
    {
        $this->servername = $servername;
        $this->db = $db;
        $this->username = $username;
        $this->password = $password;

    }
    public function connect(){
        $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->username, $this->password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;
    }
    public function dataVerification($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

}