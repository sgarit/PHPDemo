<?php
class users{
    private $conn;
    private $table = 'users';
    public $id ;
    public $First_Name;
    public $Last_Name;
    public $Email;
    public $Password;
    
    public function __construct($db){
        $this->conn = $db; 
    }
    
    function read(){
      $query = "SELECT id,First_Name,Last_Name,Email FROM $this->table";
      $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }
}

?>