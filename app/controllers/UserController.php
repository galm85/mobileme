<?php


 Class UserController extends MainController{

    public $errors = [];


    
   public function logout(){
      if(isset($_SESSION['USER'])){
         unset($_SESSION['USER']);
         $this->redirect('');
      }
   }

 }