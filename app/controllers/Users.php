<?php
  class Users extends Controller {
    public function __construct(){
        $this->userModel = $this->model('User');

    }
      
    public function index(){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      
       // Get users
      $users = $this->userModel->getUsers();

      $data = [
        'users' => $users
      ]; 
        
      $this->view('users/index', $data);
    }  

    public function add(){
      if(!isLoggedIn()){
        redirect('login');
      }
        
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
         
          // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        // Init data
        $data =[
          'username' => trim($_POST['username']),
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'confirm_password' => trim($_POST['confirm_password']),
          'firstname' => trim($_POST['firstname']),
          'lastname' => trim($_POST['lastname']),
          'profession' => $_POST['profession'],
          'power' => trim($_POST['power']),
          'img' => trim($_FILES['img']['name']),
          'img_tmp' => $_FILES['img']['tmp_name'],    
          'username_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'firstname_err' => '',
          'lastname_err' => '',
          'profession_err' => '',
          'power_err' => '',    
          'img_err' => ''    
        ];

        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Unesite email';
        }else{
            if($this->userModel->findUserByEmail($data['email'])){
                $data['email_err'] = 'Email je već iskorišćen';    
            }
        }

        // Validate Name
        if(empty($data['username'])){
          $data['username_err'] = 'Unesite korisnicko ime';
        }
        // Validate Firstname
        if(empty($data['firstname'])){
          $data['firstname_err'] = 'Unesite ime';
        }
          
        // Validate Lastname
        if(empty($data['lastname'])){
          $data['lastname_err'] = 'Unesite prezime';
        }
        
        // Validate Profession
        if(empty($data['profession'])){
          $data['profession_err'] = 'Unesite zanimanje';
        }
          
        // Validate Power
        if(empty($data['power'])){
          $data['power_err'] = 'Unesite ulogu';
        }
        // Validate img
        if(empty($data['img'])){
            $data['img'] = 'user-icon.png'; 
           
        }     

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Unesite password';
        } elseif(strlen($data['password']) < 6){
          $data['password_err'] = 'Lozinka mora da iama minimum 6 karaktera';
        }
       

        // Validate Confirm Password
        if(empty($data['confirm_password'])){
          $data['confirm_password_err'] = 'Potvrdite lozinku';
        } else {
          if($data['password'] != $data['confirm_password']){
            $data['confirm_password_err'] = 'Lozinke se ne poklapaju';
          }
        }

        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['name_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])){
            // Validated
            
            // Hash Password
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
            
            //Register User
            if($this->userModel->add($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");
                flash('post_message', 'Korisnik je dodat ');
                redirect('users');    
            }else{
                die('Something went wrong');
            }
          
        } else {
          // Load view with errors
          $this->view('users/add', $data);
        }
        
      } else {
        // Init data
        $data =[
          'username' => '',
          'email' => '',
          'password' => '',
          'confirm_password' => '',
          'firstname' => '',
          'lastname' => '',
          'profession' => '',
          'power' => '',
          'img' => '',     
              
          'username_err' => '',
          'email_err' => '',
          'password_err' => '',
          'confirm_password_err' => '',
          'firstname_err' => '',
          'lastname_err' => '',
          'profession_err' => '',
          'power_err' => '',
          'img_err' => ''    
              
        ];

        // Load view
        $this->view('users/add', $data);
      }
    }
      
      
    public function edit($id){
      if(!isLoggedIn()){
        redirect('users/login');
      }
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Sanitize POST array
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        $data = [
            'id' => $id,
            'username' => trim($_POST['username']),
            'email' => trim($_POST['email']),
            'password' => trim($_POST['password']),
            'password_new' => trim($_POST['password_new']),
            'password_new_check' => trim($_POST['password_new_check']),
            'firstname' => trim($_POST['firstname']),
            'lastname' => trim($_POST['lastname']),  
            'profession' => trim($_POST['profession']),
            'power' => trim($_POST['power']),  
            'img' => trim($_FILES['img']['name']),
            'img_tmp' => $_FILES['img']['tmp_name'],
            'img_upload'=> '',
            'username_err' => '',
            'email_err' => '',
            'password_err' => '',
            'password_new_err' => '',
            'password_new_check_err' => '',
            'firstname_err' => '',
            'lastname_err' => '',  
            'profession_err' => '',
            'power_err' => '',  
            'img_err' => ''
            
        ];

        //Validate title
          if(empty($data['username'])){
              $data['username_err'] = 'Unesite Korisnicko ime';
          }
          if(empty($data['email'])){
              $data['email_err'] = 'Unesite email';
          }
          //Validate pass
          if(empty($data['password'])){
              $data['password_err'] = 'Unesite Lozinku';
          }else{
            $user = $this->userModel->getUserById($id);
               
            if(!password_verify($data['password'], $user->password)){
                $data['password_err'] = 'Pogresna lozinka';   
            }
          }
          if(empty($data['password_new'])){
              $data['password_new_err'] = 'Unesite Lozinku';
          }elseif(strlen($data['password_new']) < 6){
          $data['password_new_err'] = 'Lozinka mora da iama minimum 6 karaktera';
        }
          if(empty($data['password_new_check'])){
              $data['password_new_check_err'] = 'Unesite Lozinku';
          }elseif($data['password_new'] != $data['password_new_check']){
              $data['password_new_check_err'] = 'Lozinke se ne poklapaju';
          }
          //Validate short text
          if(empty($data['firstname'])){
              $data['firstname_err'] = 'Unesite ime';
          }
          if(empty($data['lastname'])){
              $data['lastname_err'] = 'Unesite prezime';
          }
          //Validate long text
          if(empty($data['profession'])){
              $data['profession_err'] = 'Unesite zanimanje';
          }
          if(empty($data['power'])){
              $data['power_err'] = 'Unesite ulogu';
          }
          
          if(empty($data['img'])){
              $user = $this->userModel->getUserById($id);
               $data['img'] = $user->img;
              
          }
          
          
          if(empty($data['password']) && empty($data['password_new']) && empty($data['password_new_check'])){
              $data['password_err'] = '';
              $data['password_new_err'] = '';
              $data['password_new_check_err'] = '';
              $user = $this->userModel->getUserById($id);
              $data['password_new'] = $user->password;
          }

        //Make sure no errors
          if(empty($data['username_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['password_new_err']) && empty($data['password_new_check_err'])&& empty($data['firstname_err']) && empty($data['lastname_err']) && empty($data['profession_err']) && empty($data['power_err'])){
              
              $firstChar = mb_substr($data['password_new'], 0, 7, "UTF-8");
              if($firstChar != '$2y$10$'){
                $data['password_new'] = password_hash($data['password_new'], PASSWORD_DEFAULT);    
              }
            
              
             
            //Validated
              if($this->userModel->updateUser($data)){
                $img = $data['img'];
                move_uploaded_file($data['img_tmp'], "../public/img/$img");
                flash('post_message', 'Izmjene se sacuvane');
                redirect('users');   
              }else{
                  die('Something went wrong');
              }
          }else{
                $user = $this->userModel->getUserById($id);
                $data['img'] = $user->img;
              //Load view width errors
              $this->view('users/edit', $data);
          }

      } else {
        
        // Get existing post from model
        $user = $this->userModel->getUserById($id);



        $data = [
        'id' => $id,    
        'username' => $user->username,
        'email' => $user->email,
        'password' => '',
        'firstname' => $user->firstname,
        'lastname' => $user->lastname,     
        'profession' => $user->profession,
        'power' => $user->power,     
        'img' => $user->img,
        
        'username_err' => '',
        'email_err' => '',
        'password_err' => '',
        'password_new_err' => '',
        'password_new_check_err' => '',    
        'firstname_err' => '',
        'lastname_err' => '',     
        'profession_err' => '',
        'power_err' => '',     
        'img_err' => ''
        ];
          
          if(empty($data['img'])){
              
               $data['img'] = 'user-icon.png';
          }
          
  
        $this->view('users/edit', $data);
      }
    }  
      
      
    public function login(){
      // Check for POST
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // Process form
        // Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        
        // Init data
        $data =[
          'email' => trim($_POST['email']),
          'password' => trim($_POST['password']),
          'email_err' => '',
          'password_err' => '',      
        ];
          
        // Validate Email
        if(empty($data['email'])){
          $data['email_err'] = 'Please enter email';
        }

        // Validate Password
        if(empty($data['password'])){
          $data['password_err'] = 'Please enter password';
        }

        // Check for user/email
        if($this->userModel->findUserByEmail($data['email'])){
          // User found
        } else {
          // User not found
          $data['email_err'] = 'No user found';
        } 
          
        // Make sure errors are empty
        if(empty($data['email_err']) && empty($data['password_err'])){
          // Validated
          // Check and set logged in user
          $loggedInUser = $this->userModel->login($data['email'], $data['password']);

          if($loggedInUser){
            // Create Session
            $this->createUserSession($loggedInUser);
          } else {
            $data['password_err'] = 'Password incorrect';

            $this->view('users/login', $data);
          }
        } else {
          // Load view with errors
          $this->view('users/login', $data);
        }  
      } else {
        // Init data
        $data =[    
          'email' => '',
          'password' => '',
          'email_err' => '',
          'password_err' => '',        
        ];

        // Load view
        $this->view('users/login', $data);
      }
    }
      
    public function createUserSession($user){
      $_SESSION['user_id'] = $user->id;
      $_SESSION['user_username'] = $user->username;    
      $_SESSION['user_email'] = $user->email;
      $_SESSION['user_firstname'] = $user->firstname;
      $_SESSION['user_lastname'] = $user->lastname;
      $_SESSION['user_profession'] = $user->profession;
      $_SESSION['user_power'] = $user->power;
      $_SESSION['user_img'] = $user->img;    
      redirect('');
    }

    public function logout(){
      unset($_SESSION['user_id']);
      unset($_SESSION['user_username']) ;   
      unset($_SESSION['user_email']);
      unset($_SESSION['user_firstname']);
      unset($_SESSION['user_lastname']);
      unset($_SESSION['user_profession']);
      unset($_SESSION['user_power']);
      unset($_SESSION['user_img']);    
      session_destroy();
      redirect('users/login');
    }

    public function isLoggedIn(){
      if(isset($_SESSION['user_id'])){
        return true;
      } else {
        return false;
      }
    }
      
      
    public function delete($id){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($this->userModel->deleteUser($id)){
          flash('post_message', 'Korisnik je izbrisan');
          redirect('users');
        } else {
          die('Something went wrong');
        }
      } else {
      
        redirect('users');
      }
    }    
      
  }