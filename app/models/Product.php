<?php
  class Product {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }

    public function getProducts(){
      $this->db->query("SELECT * FROM products ORDER BY products.created_at DESC");
      return $this->db->resultSet();
    }
 
    public function addProduct($data){
      $this->db->query('INSERT INTO products (title, title_en, about, about_en, text_short, text_short_en, text_long, text_long_en, img_cover, img, alt_tag, alt_tag_en) VALUES(:title, :title_en, :about, :about_en, :text_short, :text_short_en, :text_long, :text_long_en, :img_cover, :img, :alt_tag, :alt_tag_en)');
      // Bind values
         
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);
      $this->db->bind(':about', $data['about']);
      $this->db->bind(':about_en', $data['about_en']);    
      $this->db->bind(':text_short', $data['text_short']);
      $this->db->bind(':text_short_en', $data['text_short_en']);    
      $this->db->bind(':text_long', $data['text_long']);
      $this->db->bind(':text_long_en', $data['text_long_en']);
      $this->db->bind(':img_cover', $data['img_cover']);    
      $this->db->bind(':img', $data['img']);
      $this->db->bind(':alt_tag', $data['alt_tag']);
      $this->db->bind(':alt_tag_en', $data['alt_tag_en']);

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
      
      
    public function updateProduct($data){
      $this->db->query('UPDATE products SET title = :title, title_en = :title_en, about = :about, about_en = :about_en, text_short = :text_short, text_short_en = :text_short_en, text_long = :text_long, text_long_en = :text_long_en, img_cover = :img_cover, img = :img, alt_tag = :alt_tag, alt_tag_en = :alt_tag_en, status = :status WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['id']);
          
      $this->db->bind(':title', $data['title']);
      $this->db->bind(':title_en', $data['title_en']);
      $this->db->bind(':about', $data['about']);
      $this->db->bind(':about_en', $data['about_en']);    
      $this->db->bind(':text_short', $data['text_short']);
      $this->db->bind(':text_short_en', $data['text_short_en']);    
      $this->db->bind(':text_long', $data['text_long']);
      $this->db->bind(':text_long_en', $data['text_long_en']);
      $this->db->bind(':img_cover', $data['img_cover']);    
      $this->db->bind(':img', $data['img']);
      $this->db->bind(':alt_tag', $data['alt_tag']);
      $this->db->bind(':alt_tag_en', $data['alt_tag_en']);   
      $this->db->bind(':status', $data['status']);     

      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function getProductById($id){
      $this->db->query('SELECT * FROM products WHERE id = :id');
      $this->db->bind(':id', $id);

      $row = $this->db->single();

      return $row;
    } 
      
    public function deleteProduct($id){
      $this->db->query('DELETE FROM products WHERE id = :id');
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