<?php
  class Careers extends Controller {
    public function __construct(){
      if(!isLoggedIn()){
        redirect('users/login');
      }

      $this->careerModel = $this->model('Career');
    }
    public function index(){
     
       // Get careers
      $careers = $this->careerModel->getCareers();

      $data = [
        'careers' => $careers
      ]; 
        
      $this->view('careers/index', $data);
    }
      
      
  public function add(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
          
          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
          
          $data = [
            
            'title' => trim($_POST['title']),
            'title_en' => trim($_POST['title_en']),  
            'text' => trim($_POST['text']),
            'text_en' => trim($_POST['text_en']),  
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => trim($_FILES['img']['tmp_name']),
            'date_start' => trim($_POST['date_start']),
            'date_finish' => trim($_POST['date_finish']),  
            'title_err' => '',
            'title_en_err' => '',  
            'text_err' => '',
            'text_en_err' => '',  
            'img_err' => '',  
            'date_start_err' => '',
            'date_finish_err' => ''  
          ];
 

          //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
        
          //Validate short text
          if(empty($data['text'])){
              $data['text_err'] = 'Unesite text';
          }
          if(empty($data['text_en'])){
              $data['text_en_err'] = 'Unesite text';
          }
          
          //Validate img
          if(empty($data['img'])){
              $data['img_err'] = 'Unesite sliku';
          }
      
        
         //Validate date
          if(empty($data['date_start'])){
              $data['date_start_err'] = 'Unesite pocetak konkursa';
          }
          if(empty($data['date_finish'])){
              $data['date_finish_err'] = 'Unesite kraj konkursa';
          }
          
          
          
          //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['text_err']) && empty($data['text_en_err']) && empty($data['img_err']) && empty($data['date_start_err']) && empty($data['date_finish_err'])){
            //Validated
              if($this->careerModel->addCareer($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");  
                flash('post_message', 'Konkurs je dodat');
                redirect('../careers');   
              }else{
                  die('Something went wrong');
              }
          }else{
              //Load view width errors
              $this->view('careers/add', $data);
          }
          
      }else{
         $data = [
        
        'title' => '',
        'title_en' => '',     
        'text' => '',
        'text_en' => '',     
        'img' => '',
        'date_start' => '',
        'date_finish' => '',     
       
        'title_err' => '',
        'title_en_err' => '',     
        'text_err' => '',
        'text_en_err' => '',   
        'img_err' => '',
        'date_start_err' => '',
        'date_finish_err' => '',     
      ]; 
       $this->view('careers/add', $data); 
          
          
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
            'text' => trim($_POST['text']),
            'text_en' => trim($_POST['text_en']),  
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => $_FILES['img']['tmp_name'],
            'status' => trim($_POST['status']),
            'date_start' => trim($_POST['date_start']),
            'date_finish' => trim($_POST['date_finish']),  
            'title_err' => '',
            'title_en_err' => '',  
            'text_err' => '',
            'text_en_err' => '',  
            'img_err' => '',
            'date_start_err' => '',
            'date_finish_err' => '' 
        ];

        //Validate title
          if(empty($data['title'])){
              $data['title_err'] = 'Unesite naslov';
          }
          if(empty($data['title_en'])){
              $data['title_en_err'] = 'Unesite naslov';
          }
        
          //Validate short text
          if(empty($data['text'])){
              $data['text_err'] = 'Unesite text';
          }
          if(empty($data['text_en'])){
              $data['text_en_err'] = 'Unesite text';
          }
          
          //Validate img
          if(empty($data['img'])){
              $career = $this->careerModel->getCareerById($id);
              $data['img'] = $career->img;
          }
        
         
         //Validate date
          if(empty($data['date_start'])){
              $data['date_start_err'] = 'Unesite pocetak konkursa';
          }
          if(empty($data['date_finish'])){
              $data['date_finish_err'] = 'Unesite kraj konkursa';
          }
          

        //Make sure no errors
          if(empty($data['title_err']) && empty($data['title_en_err']) && empty($data['text_err']) && empty($data['text_en_err']) && empty($data['date_start_err']) && empty($data['date_finish_err'])){
            //Validated
              if($this->careerModel->updateCareer($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");   
                flash('post_message', 'Izmjene se sacuvane');
                redirect('../../careers');   
              }else{
                  die('Something went wrong');
              }
          }else{
              $career = $this->careerModel->getCareerById($id);
              $data['img'] = $career->img;
             
              $data['date_start'] = $career->date_start;
              $data['date_finish'] = $career->date_finish;
              //Load view width errors
              $this->view('careers/edit', $data);
          }

      } else {
        // Get existing post from model
        $career = $this->careerModel->getCareerById($id);



        $data = [
        'id' => $id,    
       
        'title' => $career->title,
        'title_en' => $career->title_en,     
        'text' => $career->text,
        'text_en' => $career->text_en,     
        'img' => $career->img,
        'status' => $career->status,    
        'date_start' => $career->date_start,
        'date_finish' => $career->date_finish,    
        'title_err' => '',
        'title_en_err' => '',  
        'text_err' => '',
        'text_en_err' => '',  
        'img_err' => '',
        'status_err' => '',  
        'date_start_err' => '',
        'date_finish_err' => ''
        ];
  
        $this->view('careers/edit', $data);
      }
    }
      
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->careerModel->deleteCareer($id)){
          flash('post_message', 'Konkurs je izbrisan');
          redirect('../../careers');
        } else {
          die('Something went wrong');
        }
      } else {
         
        redirect('../../careers');
      }
    }  
      
 }