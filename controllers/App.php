<?php
abstract class Controller {
    function __construct($return_mode){
        $filepath = $_SERVER['SCRIPT_FILENAME'];

        $this->host       = 'localhost';
        $this->dbname     = 'dbsmkn';
        $this->dbuser     = 'root';
        $this->dbpass     = '';
        
        $this->returnType      = ($return_mode == 'REQUEST' ? 1 : 0);
        $this->currentFile     = basename($filepath);
        $this->currentFilename = basename($filepath, ".php");
    }

    function connect(){
        $sambung = new mysqli($this->host, $this->dbuser, $this->dbpass, $this->dbname);

        if($sambung->connect_error){
            echo $sambung->connect_error;
        }else{
            return $sambung;
        }
    }

    function fetchRow($query){
        $response = (object) [];
        $connect = $this->connect();
        $prepareQuery = mysqli_query($connect, $query);
        $collect = mysqli_fetch_array($prepareQuery, MYSQLI_ASSOC);
        $response = json_decode(json_encode($collect));
        $connect->close();

        return $response;
    }

    function fetchRows($query){
        $response = [];
        $connect = $this->connect();
        $prepareQuery = mysqli_query($connect, $query);

        while($collect = mysqli_fetch_array($prepareQuery, MYSQLI_ASSOC)){
            $response[] = json_decode(json_encode($collect));
        }

        $connect->close();

        return $response;
    }

    function runQuery($query){
        $connect = $this->connect();
        $prepareQuery = mysqli_query($connect, $query);

        $connect->close();

        return $prepareQuery;
    }
}