<?php
  class Products extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->productModel = $this->model('Product');
    }
    public function index(){
      
       // Get products
      $products = $this->productModel->getProducts();

      $data = [
        'products' => $products
      ]; 
        
      $this->view('products/index', $data);
    }
      
      
  public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [
            
            'title' => trim($_POST['title']),
            'title_en' => trim($_POST['title_en']),
            'about' => trim($_POST['about']),
            'about_en' => trim($_POST['about_en']),   
            'text_short' => trim($_POST['text_short']),
            'text_short_en' => trim($_POST['text_short_en']),  
            'text_long' => trim($_POST['text_long']),
            'text_long_en' => trim($_POST['text_long_en']),
            'img_cover' => trim($_FILES['img_cover']['name']),
            'img_cover_tmp' => $_FILES['img_cover']['tmp_name'],   
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => $_FILES['img']['tmp_name'],   
            'alt_tag' => trim($_POST['alt_tag']),
            'alt_tag_en' => trim($_POST['alt_tag_en']),  
           
            'title_err' => '',
            'title_en_err' => '',
            'about_err' => '',  
            'about_en_err' => '',  
            'text_short_err' => '',
            'text_short_en_err' => '',  
            'text_long_err' => '',
            'text_long_en_err' => '',
            'img_cover_err' => '',  
            'img_err' => '',
            'alt_tag_err' => '',
            'alt_tag_en_err' => '',  
         
            
          ];
 
     //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
          //Validate about
          if(empty($data['about'])){
              $data['about_err'] = 'Unesite kratki opis';
          }
          if(empty($data['about_en'])){
              $data['about_en_err'] = 'Unesite kratki opis';
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
              $data['text_long_err'] = 'Unesite text';
          }
          if(empty($data['text_long_en'])){
              $data['text_long_en_err'] = 'Unesite text';
          }
          //Validate img
          if(empty($data['img_cover'])){
              $data['img_cover_err'] = 'Unesite cover fotografiju';
          }
          if(empty($data['img'])){
              $data['img_err'] = 'Unesite uvodnu fotografiju';
          }
          //Validate alt tag
          if(empty($data['alt_tag'])){
              $data['alt_tag_err'] = 'Unesite Alt tag';
          }
          if(empty($data['alt_tag_en'])){
              $data['alt_tag_en_err'] = 'Unesite Alt tag';
          }
         
         
    //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['about_err']) && empty($data['about_en_err']) && empty($data['text_short_err']) && empty($data['text_short_en_err']) && empty($data['text_long_err']) && empty($data['text_long_en_err']) && empty($data['img_cover_err']) && empty($data['img_err']) && empty($data['alt_tag_err']) && empty($data['alt_tag_en_err'])){
            //Validated
              if($this->productModel->addProduct($data)){
                $img_cover = $data['img_cover'];
                move_uploaded_file($data['img_cover_tmp'], "../public/img/$img_cover");  
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");   
                flash('post_message', 'Proizvod je dodat');
                redirect('../products');   
              }else{
                  die('Something went wrong');
              }
          }else{
              //Load view width errors
              $this->view('products/add', $data);
          }
          
      }else{
         $data = [
        
        'title' => '',
        'title_en' => '', 
        'about' => '',
        'about_en' => '',     
        'text_short' => '',
        'text_short_en' => '',     
        'text_long' => '',
        'text_long_en' => '',
        'img_cover' => '',     
        'img' => '',
        'alt_tag' => '',
        'alt_tag_en' => '',     
        'status' => '',
        
        'title_err' => '',
        'title_en_err' => '',     
        'about_err' => '',
        'about_en_err' => '',     
        'text_short_err' => '',
        'text_short_en_err' => '',     
        'text_long_err' => '',
        'text_long_en_err' => '',
        'img_cover_err' => '',     
        'img_err' => '',
        'alt_tag_err' => '',
        'alt_tag_en_err' => '',     
        'status_err' => ''    
      ]; 
  
      
      
      $this->view('products/add', $data); 
          
          
      }
      
      
      
  }
      
      
      
    public function edit($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'title' => trim($_POST['title']),
            'title_en' => trim($_POST['title_en']),
            'about' => trim($_POST['about']),
            'about_en' => trim($_POST['about_en']),
            'text_short' => trim($_POST['text_short']),
            'text_short_en' => trim($_POST['text_short_en']),  
            'text_long' => trim($_POST['text_long']),
            'text_long_en' => trim($_POST['text_long_en']),
            'img_cover' => trim($_FILES['img_cover']['name']),
            'img_cover_tmp' => $_FILES['img_cover']['tmp_name'],
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => $_FILES['img']['tmp_name'],
            'alt_tag' => trim($_POST['alt_tag']),
            'alt_tag_en' => trim($_POST['alt_tag_en']),  
            'status' => trim($_POST['status']),
            
            'title_err' => '',
            'title_en_err' => '',
            'about_err' => '',
            'about_en_err' => '',
            'text_short_err' => '',
            'text_short_en_err' => '',  
            'text_long_err' => '',
            'text_long_en_err' => '',
            'img_cover_err' => '',
            'img_err' => '',
            'alt_tag_err' => '',
            'alt_tag_en_err' => '',  
            'status_err' => ''
            
        ];

        //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
          //Validate about
          if(empty($data['about'])){
              $data['about_err'] = 'Unesite kratki opis';
          }
          if(empty($data['about_en'])){
              $data['about_en_err'] = 'Unesite kratki opis';
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
              $data['text_long_err'] = 'Unesite text';
          }
          if(empty($data['text_long_en'])){
              $data['text_long_en_err'] = 'Unesite text';
          }
          //Validate img
          if(empty($data['img_cover'])){
              $product = $this->productModel->getProductById($id);
              $data['img_cover'] = $product->img_cover;
          }
          if(empty($data['img'])){
              $product = $this->productModel->getProductById($id);
              $data['img'] = $product->img;
          }
       
          //Validate alt tag
          if(empty($data['alt_tag'])){
              $data['alt_tag_err'] = 'Unesite Alt tag';
          }
          if(empty($data['alt_tag_en'])){
              $data['alt_tag_en_err'] = 'Unesite Alt tag';
          }
         //Validate status
          if(empty($data['status'])){
              $data['status_err'] = 'Unesite Status';
          }

        //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['about_err']) && empty($data['about_en_err']) && empty($data['text_short_err']) && empty($data['text_short_en_err']) && empty($data['text_long_err']) && empty($data['text_long_en_err']) && empty($data['alt_tag_err']) && empty($data['alt_tag_en_err']) && empty($data['status_err'])){
            //Validated
              if($this->productModel->updateProduct($data)){
                  
                $img_cover = $data['img_cover'];
                move_uploaded_file($data['img_cover_tmp'], "../public/img/$img_cover");  
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");
                flash('post_message', 'Izmjene su sacuvane');
                redirect('../../products');   
              }else{
                  die('Something went wrong');
              }
          }else{
              $product = $this->productModel->getProductById($id);
              $data['img'] = $product->img;
              $data['img_cover'] = $product->img_cover;
              //Load view width errors
              $this->view('products/edit', $data);
          }

      } else {
        // Get existing post from model
        $product = $this->productModel->getProductById($id);

        $data = [
        'id' => $id,    
        'title' => $product->title,
        'title_en' => $product->title_en,
        'about' => $product->about,
        'about_en' => $product->about_en,    
        'text_short' => $product->text_short,
        'text_short_en' => $product->text_short_en,     
        'text_long' => $product->text_long,
        'text_long_en' => $product->text_long_en,
        'img_cover' => $product->img_cover,    
        'img' => $product->img,
        'alt_tag' => $product->alt_tag,
        'alt_tag_en' => $product->alt_tag_en,     
        'status' => $product->status,
        'title_err' => '',
        'title_en_err' => '',
        'about_err' => '',
        'about_en_err' => '',
        'text_short_err' => '',
        'text_short_en_err' => '',  
        'text_long_err' => '',
        'text_long_en_err' => '',
        'img_cover_err' => '',
        'img_err' => '',
        'alt_tag_err' => '',
        'alt_tag_en_err' => '',  
        'status_err' => ''
        ];
  
        $this->view('products/edit', $data);
      }
    }
      
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->productModel->deleteProduct($id)){
          flash('post_message', 'Proizvod je izbrisan');
          redirect('../../products');
        } else {
          die('Something went wrong');
        }
      } else {
         
        redirect('../../products');
      }
    }  
      
 }