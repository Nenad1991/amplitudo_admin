<?php
  class Pages extends Controller {
    public function __construct(){
        if(!isLoggedIn()){
            redirect('users/login');
        }
        
    }
    
    public function index(){
      $data = [
        'title' => 'Amplitudo',
        'description' => 'Amplitudo',  
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us'
      ];

      $this->view('pages/about', $data);
    }
  }