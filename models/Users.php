<?php
class Users{

    private $conn;
    private $table='users';

    public $id;
    public $name;
    public $email;
    public $status;

    public function __construct($db){
        $this->conn=$db;

    }

    public function read(){
        $query='SELECT * FROM '.$this->table.' ';

        $stmt=$this ->conn->prepare($query);
        $stmt->execute();
        return $stmt;

    }

    //get users by id
    public function read_single(){
        $query='SELECT * FROM '.$this->table.' WHERE id=?';

        $stmt = $this->conn->prepare($query);

        $stmt->bindparam(1,$this->id);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name=$row['name'];
        $this->email=$row['email'];
        $this->status=$row['status'];
        
      }

      //check user is valid or not

      public function read_credentials(){
        $query='SELECT * FROM '.$this->table.' WHERE  name=? and password=?';

        $stmt = $this->conn->prepare($query);

       
        $stmt->bindparam(1,$this->name);
        $stmt->bindparam(2,$this->password);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $this->name=$row['name'];
        $this->email=$row['email'];
        $this->status=$row['status'];

        if($stmt->execute()) {
            return true;
      }
  
      // Print error 
      printf("Error: %s.\n", "invalid user");
  
      return false;
        
        
      }
}