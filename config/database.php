<?php

class Database
{    
    private $conn = null;
    
    function __construct(){
        global $config;
        $this->conn = new PDO("mysql:host={$config['db_host']};
        dbname={$config['db_name']}", $config['db_username'],$config['db_pass'],
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    function __destruct(){
        $this->conn = null;
    }

    public function prep_sql($sql){
        return $this->conn->prepare($sql);;
    }

    public function run_prep_sql($stmt, ...$parameters){
        $last_id = null;
        try {
         

		if (empty($parameters)) {
			$parameters = [];
		}

		$stmt->execute($parameters);
		$last_id = $this->conn->lastInsertId();
        }catch (PDOException $e) {
            echo 'Error: ', $e->getMessage();
        }
        return $last_id;
    } 
      
    public function action($sql, ...$parameters){
        $last_id = null;
        try {
            $stmt = $this->conn->prepare($sql);

		if (empty($parameters)) {
			$parameters = [];
		}

		$stmt->execute($parameters);
		$last_id = $this->conn->lastInsertId();
        }catch (PDOException $e) {
            echo 'Error: ', $e->getMessage();
        }
        return $last_id;
    } 

    function select($sql, ...$parameters) {
        $result = [];
        try {
            
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $stmt = $this->conn->prepare($sql);
    
            if (empty($parameters)) {
                $parameters = [];
            }
    
            $stmt->execute($parameters);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        } catch (PDOException $e) {
            echo 'Error: ', $e->getMessage();
            var_dump($parameters);
    
        }
        return $result;
    }

}
