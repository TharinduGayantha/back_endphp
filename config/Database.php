<?php
class Database{
private $host ='localhost:3307';
private $db_name='userdb';
private $username='root';
private $password='123';
private $conn;

// DB Connect
public function connect() {
    $this->conn = null;

    try { 
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
      echo 'Connection Error: ' . $e->getMessage();
      echo 'error db not working';
    }

    return $this->conn;
  }



}