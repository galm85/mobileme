<?php


    class Cart extends Database{

        protected $table = 'carts';
        
        public function get_cart_content($user_id){
            $cart = $this->single('user_id',$user_id);
            return $cart;
        }

        public function get_cart_items($user_id){
            $productModel = new Product();
            $cart = $this->single('user_id',$user_id);
            $items = unserialize($cart->items);
            $products = [];
            foreach($items as $item){
                $product = $productModel->single('id',$item['product_id']);
                $product->amount = $item['amount'];
                array_push($products,$product);
            }


            return $products;
        }



        public function get_cart_total($user_id){
            $productModel = new Product();
            $cart = $this->single('user_id',$user_id);
            $items = unserialize($cart->items);
            $total = 0;
    
            foreach($items as $item){
                $product = $productModel->single('id',$item['product_id']);
                $sub = $item['amount'] * $product->price;
                $total = $total + $sub;
    
            }
    
            return $total;
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
        
        if($cart){
            $items = unserialize($cart->items);
            foreach($items as $item){
                $amount = $amount+ $item['amount'];
            }
            return $amount;
        }else{
            return 0;
        }
            

       }


       public function clearCart($user_id){

           $sql = "DELETE FROM carts  WHERE user_id = $user_id";
            $this->query($sql,[],'delete');
       }

    }





    