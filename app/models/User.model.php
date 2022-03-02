<?php
    


    class User extends Database{

        protected $table = 'users';
        public $errors = [];


    public function renderPassword($password){
        $h_password = password_hash($password,PASSWORD_BCRYPT);
        return $h_password;
    }


    public function validRegister($data){
        
        $this->errors = [];
        $valid = false;

        if($data['first_name'] == '') {$this->errors['first_name'] = 'Please insert first name';}
        if($data['last_name'] == '') {$this->errors['last_name'] = 'Please insert last name';}
        if($data['email'] == '') {$this->errors['email'] = 'Please insert Email';}
        if($data['password'] == '') {$this->errors['password'] = 'Please insert Password';}
        if($data['password'] != $data['confirm']) {$this->errors['confirm'] = 'The passwords do not match';}
        if($data['address'] == '') {$this->errors['address'] = 'Please insert address';}
        if($data['phone'] == '') {$this->errors['phone'] = 'Please insert phone';}



        if(count($this->errors) == 0){
            $valid = true;    
        }
            
        return $valid;
        
        
    }
        
    public function upload_image($data){
        $file_name = $data['name'];
        $file_name = time() . '-' . $file_name;
        $tmp_name = $data['tmp_name'];
        $local_folder = './assets/images/users/';
        if(move_uploaded_file($tmp_name,$local_folder.$file_name)){
            return $file_name;
        }else{

            return false;
        }
        
    }


    public function validatePassword($password,$h_password){
        $this->errors = [];
        $valid = password_verify($password,$h_password);
        return $valid;
    }






   

    }





    