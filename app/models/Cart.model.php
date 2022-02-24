<?php


    class Cart extends Database{

        protected $table = 'carts';
        
        public function get_cart_content($user_id){
            $cart = $this->single('user_id',$user_id);
            return $cart;
        }


       public function isCartExist($user_id){
            $cart = $this->single('user_id',$user_id);
            if($cart){
                return $cart;
            }
            return null;
            
       }


       public function getAmountItems($user_id){
        $amount = 0;
        $cart = $this->single('user_id',$user_id);
        $items = unserialize($cart->items);
        foreach($items as $item){
            $amount = $amount+ $item['amount'];
        }

        return $amount;

       }



    }





    