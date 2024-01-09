<?php 

namespace App\Database;


use PDO;
use PDOException;

class Database{

   
    private $DBNAME = 'wiki';
    private $DBUSER = 'root';
    private $DBHOST = 'localhost';
    private $DBPASSWORD = '';

    public function getConnection(){
        try {
            $conn = new PDO("mysql:host=$this->DBHOST;dbname=$this->DBNAME", $this->DBUSER, $this->DBPASSWORD);
            
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
            
          } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
          }
    }


    


   
    



}