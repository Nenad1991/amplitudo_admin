<?php
  class User {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
      
      
    public function getUsers(){
      $this->db->query("SELECT * FROM users");
      return $this->db->resultSet();
    }  
      
    //Add User
    public function add($data){
        $this->db->query('INSERT INTO users (username, email, password, firstname, lastname, profession, power, img) VALUES(:username, :email, :password, :firstname, :lastname, :profession, :power, :img)');
        
        $this->db->bind(':username', $data['username']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':firstname', $data['firstname']);
        $this->db->bind(':lastname', $data['lastname']);
        $this->db->bind(':profession', $data['profession']);
        $this->db->bind(':power', $data['power']);
        $this->db->bind(':img', $data['img']);
        
        if($this->db->execute()){
            return true;
        }else{
            return false;
        }
    }  
      
    // Login User
    public function login($email, $password){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      $hashed_password = $row->password;
      if(password_verify($password, $hashed_password)){
        return $row;
      } else {
        return false;
      }
    }
      
      
      
    public function updateUser($data){
      $this->db->query('UPDATE users SET username = :username, email = :email, password = :password, firstname = :firstname, lastname = :lastname, profession = :profession, power = :power, img = :img WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':username', $data['username']);    
      $this->db->bind(':email', $data['email']);
      $this->db->bind(':password', $data['password_new']);
      $this->db->bind(':firstname', $data['firstname']);
      $this->db->bind(':lastname', $data['lastname']);
      $this->db->bind(':profession', $data['profession']);
      $this->db->bind(':power', $data['power']);     
      $this->db->bind(':img', $data['img']);
         

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
    public function getUserById($id){
      $this->db->query('SELECT * FROM users WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    }   
      
    // Find user by email
    public function findUserByEmail($email){
      $this->db->query('SELECT * FROM users WHERE email = :email');
      $this->db->bind(':email', $email);

      $row = $this->db->single();

      // Check row
      if($this->db->rowCount() > 0){
        return true;
      } else {
        return false;
      }
    }
      
    
      
    public function deleteUser($id){
      $this->db->query('DELETE FROM users WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $id);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
      
      
      
      
      
  }