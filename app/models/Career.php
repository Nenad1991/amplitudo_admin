<?php
  class Career {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getCareers(){
      $this->db->query("SELECT * FROM career");
      return $this->db->resultSet();
    }
      
    
      
    public function addCareer($data){
      $this->db->query('INSERT INTO career (title, title_en, text, text_en, img, date_start, date_finish) VALUES(:title, :title_en, :text, :text_en, :img, :date_start, :date_finish)');
      // Bind values
       
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);    
      $this->db->bind(':text', $data['text']);
      $this->db->bind(':text_en', $data['text_en']);    
      $this->db->bind(':img', $data['img']);
        
      $date_start = DateTime::createFromFormat('d/m/Y', $data['date_start']);
      $formatDateStart = $date_start->format('Y-m-d'); 
      $this->db->bind(':date_start', $formatDateStart);
        
       $date_finish = DateTime::createFromFormat('d/m/Y', $data['date_finish']);
      $formatDateFinish = $date_finish->format('Y-m-d'); 
      $this->db->bind(':date_finish', $formatDateFinish);    
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
      
    public function updateCareer($data){
      $this->db->query('UPDATE career SET title = :title, title_en = :title_en, text = :text, text_en = :text_en, img = :img, status = :status, date_start = :date_start, date_finish = :date_finish WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);
      $this->db->bind(':text', $data['text']);
      $this->db->bind(':text_en', $data['text_en']);
      $this->db->bind(':img', $data['img']);
      $this->db->bind(':status', $data['status']);
        
      $date_start = DateTime::createFromFormat('d/m/Y', $data['date_start']);
      $formatDateStart = $date_start->format('Y-m-d'); 
      $this->db->bind(':date_start', $formatDateStart);
        
      $date_finish = DateTime::createFromFormat('d/m/Y', $data['date_finish']);
      $formatDateFinish = $date_finish->format('Y-m-d'); 
      $this->db->bind(':date_finish', $formatDateFinish);    
      

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getCareerById($id){
      $this->db->query('SELECT * FROM career WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    } 
      
    public function deleteCareer($id){
      $this->db->query('DELETE FROM career WHERE id = :id');
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