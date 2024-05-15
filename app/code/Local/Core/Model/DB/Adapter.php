<?php

class Core_Model_Db_Adapter
{
    public $config = [
        "dbname" => "ccc_practice",
        "hostname" => "localhost",
        "user" => "root",
        "password" => "",
    ];
    public $connect = null;
    public function connect()
    {
        if(is_null($this->connect)){
            $this->connect = mysqli_connect(
                $this->config['hostname'],
                $this->config['user'],
                $this->config['password'],
                $this->config['dbname']
            );
        }
        return $this->connect;
    }
    public function fetchAll($query)
    {
        $row=[];
        $result = $this->connect()->query($query);
        while($_row = mysqli_fetch_assoc($result)){
            $row[] = $_row;
        }
        return $row;
    }
    public function fetchPairs($query)
    {
    }
    public function fetchOne($query)
    {
    }
    public function fetchRow($query)
    {
        $row=[];
        $this->connect();
        $query = $query . " LIMIT 1";
        $result = $this->connect->query($query);
        while($_row = mysqli_fetch_assoc($result)){
            $row = $_row;
        }
        return $row;
    }
    public function insert($query)
    {
        $result = mysqli_query($this->connect(), $query);
        if($result){
            return mysqli_insert_id($this->connect);
        }else{
            return false;
        }
    }
    public function update($query)
    {
        $result = mysqli_query($this->connect(), $query);
        if($result){
            return true;
        }else{
            return false;
        }
        
    }
    public function delete($query)
    {
        $result = mysqli_query($this->connect(), $query);
        if($result){
            return true;
        }else{
            return false;
        }
    }
    public function query($query)
    {
    }
}