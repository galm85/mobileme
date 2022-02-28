<?php


 Class UserController extends MainController{

    public $errors = [];


    public function index(){
       $user = Auth::get_user();
       if(!$user){
          return $this->redirect('signin');
       }

       $ordersModel = new Order();
       $orders = $ordersModel->where('user_id',$user->id);
       
       if($orders){
          foreach($orders as $order){
             $order->order_details = unserialize($order->order_details);
          }
       }else{
          $orders = [];
       }

       
       


       self::$data['orders'] = $orders;
       self::$data['title'] .= $user->first_name ." ".$user->last_name;
       self::$data['user'] = $user;
       $this->view('pages/profile',self::$data);

    }

    
   public function logout(){
      if(isset($_SESSION['USER'])){
         unset($_SESSION['USER']);
         $this->redirect('');
      }
   }

 }