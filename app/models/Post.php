<?php
  class Post {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getPosts(){
      $this->db->query("SELECT * FROM posts ORDER BY posts.date DESC");
      return $this->db->resultSet();
    }
      
    
      
    public function addPost($data){
      $this->db->query('INSERT INTO posts (author, title, title_en, text_short, text_short_en, text_long, text_long_en, img, alt_tag, alt_tag_en, tags, tags_en, date) VALUES(:author, :title, :title_en, :text_short, :text_short_en, :text_long, :text_long_en, :img, :alt_tag, :alt_tag_en, :tags, :tags_en, :date)');
      // Bind values
      $this->db->bind(':author', $data['author']);    
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);    
      $this->db->bind(':text_short', $data['text_short']);
      $this->db->bind(':text_short_en', $data['text_short_en']);    
      $this->db->bind(':text_long', $data['text_long']);
      $this->db->bind(':text_long_en', $data['text_long_en']);    
      $this->db->bind(':img', $data['img']);
      $this->db->bind(':alt_tag', $data['alt_tag']);
      $this->db->bind(':alt_tag_en', $data['alt_tag_en']);    
      $this->db->bind(':tags', $data['tags']);
      $this->db->bind(':tags_en', $data['tags_en']);
        
      $date = DateTime::createFromFormat('d/m/Y', $data['date']);
      $formatDate = $date->format('Y-m-d'); 
                 
      $this->db->bind(':date', $formatDate);    

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
      
    public function updatePost($data){
      $this->db->query('UPDATE posts SET author = :author, title = :title, title_en = :title_en, text_short = :text_short, text_short_en = :text_short_en, text_long = :text_long, text_long_en = :text_long_en, img = :img, alt_tag = :alt_tag, alt_tag_en = :alt_tag_en, tags = :tags, tags_en = :tags_en, status = :status, date = :date WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
      $this->db->bind(':author', $data['author']);    
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);
      $this->db->bind(':text_short', $data['text_short']);
      $this->db->bind(':text_short_en', $data['text_short_en']);
      $this->db->bind(':text_long', $data['text_long']);
      $this->db->bind(':text_long_en', $data['text_long_en']);   $this->db->bind(':img', $data['img']);
      $this->db->bind(':alt_tag', $data['alt_tag']);
      $this->db->bind(':alt_tag_en', $data['alt_tag_en']);
      $this->db->bind(':tags', $data['tags']);
      $this->db->bind(':tags_en', $data['tags_en']);
      $this->db->bind(':status', $data['status']);    
      $date = DateTime::createFromFormat('d/m/Y', $data['date']);
      $formatDate = $date->format('Y-m-d'); 
      $this->db->bind(':date', $formatDate);        

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getPostById($id){
      $this->db->query('SELECT * FROM posts WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    } 
      
    public function deletePost($id){
      $this->db->query('DELETE FROM posts WHERE id = :id');
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