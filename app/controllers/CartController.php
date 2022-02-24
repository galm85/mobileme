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
        
        self::$data['amount'] = $cartModel->getAmountItems($user->id);
        self::$data['products'] = $this->getProductsData($items);
        self::$data['title'] .= 'Cart';
      
         $this->view('pages/cart',self::$data);
    
    }

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
    


  
 }