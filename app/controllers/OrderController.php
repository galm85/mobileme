<?php


 Class OrderController extends MainController{

     


    public function post_order(){

        $orderModel = new Order();
        $orderModel->errors = [];
        $valid = $orderModel->validateNewOrder($_POST);
        if($valid){   
            
            $user = Auth::get_user();
            $cartModel = new Cart();
            
            $order_details = $cartModel->get_cart_items($user->id);
            $order_total = $cartModel->get_cart_total($user->id);
            
            $res = $orderModel->insert([
                'user_id'=>$user->id,
                'order_details'=>serialize($order_details),
                'order_total'=>$order_total,
                'contact'=>$_POST['first_name'] .' '. $_POST['last_name'],
                'email'=>$_POST['email'],
                'phone'=>$_POST['phone'],
                'address'=>$_POST['address'],
                'credit_card'=>$_POST['credit_card'],
                'card_holder'=>$_POST['card_holder'],
                'status'=>'new'
     
            ]);
     
            if($res){
                $cartModel->clearCart($user->id);
                $response = new stdClass();
                $response->message ='Order Saved';
                $response->status = true;
                echo json_encode($response);
            }
        }else{
            $response = new stdClass();
            $response->errors = $orderModel->errors;
            $response->status = false;
            echo json_encode($response);
        }




    
    }


    public function get_user_orders($user_id){
       
        $orderModel = new Order();
        $userModel = new User();

        $orders = $orderModel->where('user_id',$user_id,true);
        $user = $userModel->single('id',$user_id);

        foreach($orders as $order){
            $order->order_details = unserialize($order->order_details);
        }
        $data = new stdClass();
        $data->orders = $orders;
        $data->user = $user;
        echo json_encode($data);

    }
  
    
 

  
 }