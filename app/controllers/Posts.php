<?php
  class Posts extends Controller {
    public function __construct(){
      

      $this->postModel = $this->model('Post');
    }
    public function index(){
        if(!isLoggedIn()){
        redirect('login');
      }
      
       // Get posts
      $posts = $this->postModel->getPosts();

      $data = [
        'posts' => $posts
      ]; 
        
      $this->view('posts/index', $data);
    }
      
      
  public function add(){
      if(!isLoggedIn()){
        redirect('../login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [
            'author' => trim($_POST['author']),
            'title' => trim($_POST['title']),
            'title_en' => trim($_POST['title_en']),  
            'text_short' => trim($_POST['text_short']),
            'text_short_en' => trim($_POST['text_short_en']),  
            'text_long' => trim($_POST['text_long']),
            'text_long_en' => trim($_POST['text_long_en']), 
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => trim($_FILES['img']['tmp_name']),  
            'alt_tag' => trim($_POST['alt_tag']),
            'alt_tag_en' => trim($_POST['alt_tag_en']),  
            'tags' => trim($_POST['tags']),
            'tags_en' => trim($_POST['tags_en']),  
            'date' => trim($_POST['date']),
            'author_err' => '',
            'title_err' => '',
            'title_en_err' => '',  
            'text_short_err' => '',
            'text_short_en_err' => '',  
            'text_long_err' => '',
            'text_long_en_err' => '',  
            'img_err' => '',
            'alt_tag_err' => '',
            'alt_tag_en_err' => '',  
            'tags_err' => '',
            'tags_en_err' => '',  
            'date_err' => '' 
          ];
 
        //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
          //Validate author
          if(empty($data['author'])){
              $data['author_err'] = 'Unesite autora bloga';
          }
          //Validate short text
          if(empty($data['text_short'])){
              $data['text_short_err'] = 'Unesite uvodni text';
          }
          if(empty($data['text_short_en'])){
              $data['text_short_en_err'] = 'Unesite uvodni text';
          }
          //Validate long text
          if(empty($data['text_long'])){
              $data['text_long_err'] = 'Unesite text bloga';
          }
          if(empty($data['text_long_en'])){
              $data['text_long_en_err'] = 'Unesite text bloga';
          }
          //Validate img
          if(empty($data['img'])){
              $data['img_err'] = 'Unesite sliku';
          }
          //Validate alt tag
          if(empty($data['alt_tag'])){
              $data['alt_tag_err'] = 'Unesite Alt tag';
          }
          if(empty($data['alt_tag_en'])){
              $data['alt_tag_en_err'] = 'Unesite Alt tag';
          }
          //Validate tags
          if(empty($data['tags'])){
              $data['tags_err'] = 'Unesite Tagove';
          }
           if(empty($data['tags_en'])){
              $data['tags_en_err'] = 'Unesite Tagove';
          }
          //Validate date
          if(empty($data['date'])){
              $data['date_err'] = 'Unesite Datum';
          }
          
          
          
          //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['author_err']) && empty($data['text_short_err']) && empty($data['text_short_en_err']) && empty($data['text_long_err']) && empty($data['text_long_en_err']) && empty($data['img_err']) && empty($data['alt_tag_err']) && empty($data['alt_tag_en_err']) && empty($data['tags_err']) && empty($data['tags_en_err']) && empty($data['date_err'])){
            //Validated
              if($this->postModel->addPost($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");  
                flash('post_message', 'Blog je dodat');
                redirect('../posts');   
              }else{
                  die('Something went wrong');
              }
          }else{
              //Load view width errors
              $this->view('posts/add', $data);
          }
          
      }else{
         $data = [
        'author' => '',
        'title' => '',
        'title_en' => '',     
        'text_short' => '',
        'text_short_en' => '',     
        'text_long' => '',
        'text_long_en' => '',     
        'img' => '',
        'alt_tag' => '',
        'alt_tag_en' => '',     
        'tags' => '',
        'tags_en' => '',     
        'date' => '',
        'author_err' => '',
        'title_err' => '',
        'title_en_err' => '',     
        'text_short_err' => '',
        'text_short_en_err' => '',     
        'text_long_err' => '',
        'text_long_en_err' => '',     
        'img_err' => '',
        'alt_tag_err' => '',
        'alt_tag_en_err' => '',     
        'tags_err' => '',
        'tags_en_err' => '',     
        'date_err' => '',     
      ]; 
  
      
      
      $this->view('posts/add', $data); 
          
          
      }
      
      
      
  }
      
      
      
    public function edit($id){
      if(!isLoggedIn()){
        redirect('../../login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'author' => trim($_POST['author']),
            'title' => trim($_POST['title']),
            'title_en' => trim($_POST['title_en']),  
            'text_short' => trim($_POST['text_short']),
            'text_short_en' => trim($_POST['text_short_en']), 'text_long' => trim($_POST['text_long']),
            'text_long_en' => trim($_POST['text_long_en']),  
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => $_FILES['img']['tmp_name'],
            'alt_tag' => trim($_POST['alt_tag']),
            'alt_tag_en' => trim($_POST['alt_tag_en']),  
            'tags' => trim($_POST['tags']),
            'tags_en' => trim($_POST['tags_en']),
            'status' => trim($_POST['status']), 
            'date' => trim($_POST['date']),
            'author_err' => '',
            'title_err' => '',
            'title_en_err' => '',  
            'text_short_err' => '',
            'text_short_en_err' => '',  
            'text_long_err' => '',
            'text_long_en_err' => '',  
            'img_err' => '',
            'alt_tag_err' => '',
            'alt_tag_en_err' => '',  
            'tags_err' => '',
            'tags_en_err' => '',  
            'date_err' => '' 
        ];

        //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
          //Validate author
          if(empty($data['author'])){
              $data['author_err'] = 'Unesite autora bloga';
          }
          //Validate short text
          if(empty($data['text_short'])){
              $data['text_short_err'] = 'Unesite uvodni text';
          }
          if(empty($data['text_short_en'])){
              $data['text_short_en_err'] = 'Unesite uvodni text';
          }
          //Validate long text
          if(empty($data['text_long'])){
              $data['text_long_err'] = 'Unesite text bloga';
          }
          if(empty($data['text_long_en'])){
              $data['text_long_en_err'] = 'Unesite text bloga';
          }
          //Validate img
          if(empty($data['img'])){
              $post = $this->postModel->getPostById($id);
              $data['img'] = $post->img;
          }
          //Validate alt tag
          if(empty($data['alt_tag'])){
              $data['alt_tag_err'] = 'Unesite Alt tag';
          }
          if(empty($data['alt_tag_en'])){
              $data['alt_tag_en_err'] = 'Unesite Alt tag';
          }
          //Validate tags
          if(empty($data['tags'])){
              $data['tags_err'] = 'Unesite Tagove';
          }
           if(empty($data['tags_en'])){
              $data['tags_en_err'] = 'Unesite Tagove';
          }
          //Validate date
          if(empty($data['date'])){
              $data['date_err'] = 'Unesite Datum';
          }

        //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['author_err']) && empty($data['text_short_err']) && empty($data['text_short_en_err']) && empty($data['text_long_err']) && empty($data['text_long_en_err']) && empty($data['img_err']) && empty($data['alt_tag_err']) && empty($data['alt_tag_en_err']) && empty($data['tags_err']) && empty($data['tags_en_err']) && empty($data['date_err'])){
              
            //Validated
              if($this->postModel->updatePost($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");  
                flash('post_message', 'Izmjene se sacuvane');
                redirect('../../posts');   
              }else{
                  die('Something went wrong');
              }
          }else{
              $post = $this->postModel->getPostById($id);
              $data['img'] = $post->img;
             
              $data['date'] = $post->date;
             
              //Load view width errors
              $this->view('posts/edit', $data);
          }

      } else {
        
    
        // Get existing post from model
      $post = $this->postModel->getPostById($id);
      $data = [
        'id' => $id,    
        'author' => $post->author,
        'title' => $post->title,
        'title_en' => $post->title_en,     
        'text_short' => $post->text_short,
        'text_short_en' => $post->text_short_en,     
        'text_long' => $post->text_long,
        'text_long_en' => $post->text_long_en,     
        'img' => $post->img,
        'alt_tag' => $post->alt_tag,
        'alt_tag_en' => $post->alt_tag_en,     
        'tags' => $post->tags,
        'tags_en' => $post->tags_en,
        'status' => $post->status,    
        'date' => $post->date,
        'author_err' => '',
        'title_err' => '',
        'title_en_err' => '',     
        'text_short_err' => '',
        'text_short_en_err' => '',     
        'text_long_err' => '',
        'text_long_en_err' => '',     
        'img_err' => '',
        'alt_tag_err' => '',
        'alt_tag_en_err' => '',     
        'tags_err' => '',
        'tags_en_err' => '',     
        'date_err' => '',
        ];
  
        $this->view('posts/edit', $data);
      }
    }
      
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->postModel->deletePost($id)){
          flash('post_message', 'Blog je izbrisan');
          redirect('../../posts');
        } else {
          die('Something went wrong');
        }
      } else {
         
        redirect('../../posts');
      }
    }  
      
 }