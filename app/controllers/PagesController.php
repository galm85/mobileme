<?php


 Class PagesController extends MainController{


    public function index(){
        $productModel = new Product();
        
        
        
        self::$data['title'] .= 'Home';
        self::$data['sales'] = $productModel->getSales();
        self::$data['new'] = $productModel->getNew();
        $this->view('pages/home',self::$data);
    }


    public function smartphones($brand=null,$item=null){

        $product = new Product();
        $brandModel = new Brand();

        if(isset($item)){
            
            self::$data['header'] = strtoupper(str_replace('-',' ',$item));
            self::$data['product'] = $product->single('title',str_replace('-',' ',$item)); 
            self::$data['title'] .= str_replace('-',' ',$item);

           return $this->view('pages/singleProduct',self::$data);
        }

       
        if(!$brand){
            self::$data['products'] = $product->getAllSamerphones();
           
        }else{
            // self::$data['products'] = $product->getProductsByCategoryAndBrand($brand);
            self::$data['products'] = $product->getAllSamerphonesByBrand($brand);
        }
        self::$data['brands'] = $brandModel->findAll();
        self::$data['title'] .= 'Smart Phones';
        $this->view('pages/smartphones',self::$data);
    }


    public function watches($brand=null,$item=null){
        $brandModel = new Brand();
        $product = new Product();

        if(isset($item)){
            
            self::$data['header'] = strtoupper(str_replace('-',' ',$item));
            self::$data['product'] = $product->single('title',str_replace('-',' ',$item)); 
            self::$data['title'] .= str_replace('-',' ',$item);

           return $this->view('pages/singleProduct',self::$data);
        }

        if(!$brand){
            self::$data['products'] = $product->getAllWatches();
        }else{   
            self::$data['products'] = $product->getAllWatchesByBrand($brand);
        }
        self::$data['brands'] = $brandModel->findAll();

        self::$data['title'] .= 'Watches';
        $this->view('pages/watches',self::$data);
    }


    public function accessories($brand=null,$item=null){
        $productModel = new Product();
        $brandModel = new Brand();

        if(isset($item)){
            
            self::$data['header'] = strtoupper(str_replace('-',' ',$item));
            self::$data['product'] = $productModel->single('title',str_replace('-',' ',$item)); 
            self::$data['title'] .= str_replace('-',' ',$item);

           return $this->view('pages/singleProduct',self::$data);
        }

        if(!$brand){
            self::$data['products'] = $productModel->getAllAccessories();
        }else{
            self::$data['products'] = $productModel->getAllAccessoriesByBrand($brand);

        }

        self::$data['brands'] = $brandModel->findAll();
        self::$data['title'] = 'Accessories';

        $this->view('pages/accessories',self::$data);
    }


    public function sales(){
        $productModel = new Product();

        self::$data['products'] = $productModel->getSales();
        self::$data['title'] .= 'Sales';

        $this->view('pages/sales',self::$data);


    }


    public function register(){
        $user = Auth::get_user();
        if($user){
            return $this->redirect('');
        }
            $userModel = new User();
            
            if(isset($_POST['submit'])){
              
                $valid =  $userModel->validRegister($_POST);

                if($valid){
                    
                    if(isset($_FILES['image'])){
                
                        $image = $userModel->upload_image($_FILES['image']);
                        if($image){
                           
                            $_POST['image'] = $image;
                        }else{
                            $_POST['image'] = 'noImage.png';
                            
                        }
                    }
                    
                    $_POST['password'] = $userModel->renderPassword($_POST['password']);
                    $_POST['is_admin'] = 0;
                    
                    unset($_POST['submit']);
                    unset($_POST['confirm']);

                    $userModel->insert($_POST);
                    $this->redirect('signin');
               }
            }

          
   
   
        self::$data['errors'] = $userModel->errors;    
        self::$data['title'] .= 'Register';
        return $this->view('pages/register',self::$data);

    }
    

    public function signin(){

        $user = Auth::get_user();
        if($user){
            return $this->redirect('');
        }

        $userModel = new User();
        $errors = [];

        if(isset($_POST['submit'])){
          
            if($user = $userModel->single('email',$_POST['email'])){
                if($userModel->validatePassword($_POST['password'],$user->password)){
                    unset($user->password);
                    $_SESSION['USER'] = $user;
                    $this->redirect('');
                }

            }else{
                $errors['main'] = 'Wrong Email of Password';
            }
           
            
                
        }
        self::$data['title'] .= "Sign In";
        self::$data['errors'] = $errors;
        return $this->view('pages/signin',self::$data);
    }



    public function cart(){

        
        $cartModel = new Cart();
        $cart = $cartModel->get_cart_content(4);
        echo '<pre>';
        print_r($cart);
    }


    public function thank(){
        self::$data['title'] .= 'Thank You';
        return $this->view('pages/thank');
    }





    public function iphone_13(){
        $productModel= new Product();
        
        self::$data['products'] = $productModel -> query("SELECT * FROM products WHERE title LIKE '%iphone 13%' ");
        self::$data['title'] .= 'Iphone 13';
        $this->view('pages/mainSale',self::$data);


       
    }
 }