<?php
class Database{
    private $host = "localhost";
    private $db_name = "testproject";
    private $username = "root";
    private $password = "";
    private $conn;
    
    public function connect(){
       //  $username = "root";
       //  $password = "";
        $this->conn = null;
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->db_name,$this->username,$this->password);
       
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);      
        
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            
        }
        return $this->conn;
    }
}
?>