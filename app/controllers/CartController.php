<?php


 Class CartController extends MainController{

     

    public function index(){
        
        $user = Auth::get_user();
        
        if(!$user){
            return $this->redirect('signin');
        }

        $cartModel = new Cart();
        $cart = $cartModel->single('user_id',$user->id);

        $items = unserialize($cart->items);
        
        self::$data['total_price'] = $this->getTotalPrice($items);
        self::$data['amount'] = $cartModel->getAmountItems($user->id);
        self::$data['products'] = $this->getProductsData($items);
        self::$data['title'] .= 'Cart';
      
         $this->view('pages/cart',self::$data);
    
    }

   
     
     public function add_item_to_cart(){
         
        $user = Auth::get_user();
        $product = $_POST['product'];
        $cartModel = new cart();

        $cart = $cartModel->isCartExist($user->id);
        
        if(!$cart){
            $arr = [];
            array_push($arr,$product);
            $items = serialize($arr);
            $cartModel->insert(['user_id'=>$user->id,'items'=>$items]);
        }else{
            $arr = unserialize($cart->items);
            array_push($arr,$product);
            $items = serialize($arr);
            $cartModel->query("UPDATE carts SET items = '$items' WHERE user_id = $user->id");
        }






     
        

    }
    

    public function update_amount_in_cart(){
        
        $user = Auth::get_user();
        $op = $_POST['op'];
        $product_id = $_POST['id'];
        
        $cartModel = new Cart();
        $cart = $cartModel->single('user_id',$user->id);
        $items = unserialize($cart->items);
        

       foreach($items as $key=>$value){
           
            if($items[$key]['product_id'] == $product_id){

               if($op == "+"){ 
                   $items[$key]['amount'] =  $items[$key]['amount'] + 1;
                }elseif($items[$key]['amount'] > 1){
                    $items[$key]['amount'] =  $items[$key]['amount'] - 1;
                }
            }
               
            }
           
            $items = serialize($items);
            $res = $cartModel->query("UPDATE carts SET items = '$items' WHERE user_id = $user->id",[],'update');
            
     
    }



    public function remove_from_cart(){
       
        $id = $_POST['id'];
        $user = Auth::get_user();

        $cartModel = new Cart();
        $cart = $cartModel->single('user_id',$user->id);

        $items = unserialize($cart->items);

       

        $updateItems = array_filter($items,function($item){
            return $item['product_id'] != $_POST['id'];
        });

        
        $items = serialize($updateItems);

        $res = $cartModel->query("UPDATE carts SET items = '$items' WHERE user_id = $user->id",[],'update');


    }




    // privates

    private function getProductsData($items){
        $products = [];
        $productModel = new Product();
        
        foreach($items as $item){

            $product = $productModel->single('id',$item['product_id']);
            $product->amount = $item['amount'];
            array_push($products,$product);
        }

        return $products;
        


    }

    private function getTotalPrice($items){
        $total = 0;
        $productModel = new Product();

        foreach($items as $item){
            $product = $productModel->single('id',$item['product_id']);
            $sub = $item['amount'] * $product->price;
            $total = $total + $sub;

        }

        return $total;
    }
 

  
 }