<?php


 Class AdminController extends MainController{


    public function index(){
        
        $productModel = new Product();
        $ordersModel = new Order();
        $categoryModel = new Category();
        $brandModel = new Brand();
        $userModel = new User();
        
        self::$data['categories'] = $categoryModel->findAll();
        self::$data['brands'] = $brandModel->findAll();
        self::$data['users'] = $userModel->where('is_admin',0);
        self::$data['user'] = Auth::get_user();
        self::$data['products'] = $productModel->findAll();
        self::$data['orders'] = $ordersModel->where('status','new');
        self::$data['title'] .= 'Admin Panel';
        
        $this->view('admin/dashboard',self::$data);
    }


    public function products($brand=null,$item=null){

        $productModel = new Product();
        $categoryModel = new Category();
        
        if(isset($_POST['filter']) && $_POST['filter'] != '' ){
            $cat_id = $_POST['filter'];

            $query = "SELECT p.*,c.title as category,b.title as brand FROM products p 
            LEFT JOIN categories c ON p.categorie_id = c.id
            LEFT JOIN brands b ON p.brand_id = b.id
            WHERE c.id = $cat_id" ;
            
        }else{
            $query = "SELECT p.*,c.title as category,b.title as brand FROM products p 
                  LEFT JOIN categories c ON p.categorie_id = c.id
                  LEFT JOIN brands b ON p.brand_id = b.id";
        }



        
        

        $products = $productModel->query($query);
        
       
        
        self::$data['title'] .= 'Admin - Products';
        self::$data['products'] = $products;
        self::$data['categories'] = $categoryModel->findAll();
        $this->view('admin/products',self::$data);
    }

    
    public function new_product(){
        
        $productModel = new Product();
        $categoryModel = new Category();
        $brandModel = new Brand();

        if(isset($_POST['submit'])){
            
            
            
            if($productModel->validate($_POST)){
               
                if(isset($_FILES['main_image'])){
                  
                    $image = $productModel->upload_image($_FILES['main_image']);
                    if($image){
                        $_POST['main_image'] = $image;
                    }
                }

                $_POST['on_sale'] = isset($_POST['on_sale']) ? 1 : 0;
                $_POST['on_stock'] = isset($_POST['on_stock']) ? 1 : 0;
                $_POST['sale_price'] = !empty($_POST['sale_price']) ? $_POST['sale_price'] : 0;
                // $_POST['images'] = isset($_POST['images']) ? $_POST['images'] : 'no_image';
                $_POST['main_image']  = isset($_POST['main_image']) ? $_POST['main_image'] : 'noImage.png';
                $_POST['code'] = 123123;
                unset($_POST['submit']);

            
                
                $res =  $productModel->insert($_POST);
            
                if($res){
                    header('Location:'.ROOT.'/admin/products');
                    exit();
                }else{
                    echo 'no save';
                }
            }
          
        }
        




        self::$data['categories'] = $categoryModel->findAll();
        self::$data['brands'] = $brandModel->findAll();
        self::$data['title'] .= 'Admin - New Product';
        self::$data['errors'] = $productModel->errors;

        return $this->view('admin/new-product',self::$data);

    }
    

    public function delete_product(){

        $productModel = new Product();
        $id = $_POST['id'];
        $sql = "DELETE FROM products WHERE id = $id";
        echo $sql;
        $productModel->query($sql);
    }


    public function categories(){

        $categoryModel = new Category();

        self::$data['categories'] = $categoryModel->findAll();
        self::$data['title'] .= 'Admin - Categories';
        $this->view('admin/categories',self::$data);

    }
 
    
    public function brands(){

        $brandModel = new Brand();
        self::$data['brands'] = $brandModel->findAll();
        self::$data['title'] .= 'Admin - Brands';
        return $this->view('admin/brands',self::$data);
        

    }
    

    public function new_brand(){

        
        self::$data['title'] .= 'Admin - Add new Brand';
        return $this->view('admin/new-brand',self::$data);

    }



    public function add_brand(){
        
       
        $errors =['title'=>"",'image'=>''];
        $brandModel = new Brand();

        if(!empty($_POST['title'])){
            $title = $_POST['title'];
        }else{
            $errors['title'] = 'Please insert Brand Name';
        }


        if(isset($_FILES['image'])){
            $image = $brandModel->upload_image($_FILES['image']);  
            if(!$image){
                $errors['image'] = 'Please Select Brand Image';
            }
        }


        if( empty($errors['title'])  &&  empty($errors['image'])){
            $data = ['title'=>$title,'image'=>$image];
            $check = $brandModel->insert($data);
            if($check){
              $response = new stdClass();
              $response->status = true;
              $response->message = 'Brand Saved';
              echo json_encode($response);
            }

        }else{
            $response = new stdClass();
            $response->status = false;
            $response->errors = $errors;
            echo json_encode($response);

        }

        
    }



    public function delete_brand(){
        
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $brandModel = new Brand();

            $sql = "DELETE FROM brands WHERE id=:id";
            $res = $brandModel->query($sql,['id'=>$id],'delete');
            if($res){
                echo 'Brand Deleted';
            }else{
                echo 'Brand did NOT delete';
            }
        }
    }




    public function orders(){

        $orderModel = new Order();
       
        self::$data['orders']= $orderModel->findAll(); 
        self::$data['title'] .= "Admin - Orders";
        return $this->view('admin/orders');

    }


    public function edit_Order($order_id){
       
        $orderModel = new Order();
        $order = $orderModel->single('id',$order_id);
        if(!$order){
            return $this->redirect('admin/orders');
        }
       
        $order->order_details = unserialize($order->order_details);
        
        self::$data['order'] = $order;
        self::$data['title'] .= 'Admin - Order';
        $this->view('admin/single-order',self::$data);
    }


    public function change_status(){
        
        $orderModel = new Order();
        $status = $_POST['status'];
        $order_id = $_POST['id'];

        $sql = "UPDATE orders SET status = '$status' WHERE id= $order_id ";

        $res = $orderModel->query($sql,[],'update');
        
        echo $res;

    }




    public function users(){
        
        $userModel = new User();

        self::$data['users'] = $userModel->query("SELECT * FROM users ORDER BY last_name ASC",[]);
        self::$data['title'] .= 'Admin - Users';
        return $this->view('admin/users',self::$data);
    }



    public function edit_product($product_id){

        $productModel = new Product();
        $brandModel = new Brand();
        $categoryModel = new Category();


        self::$data['title'] .= 'Admin - Edit Product';
        self::$data['product'] = $productModel->single('id',$product_id);
        self::$data['categories'] = $categoryModel->findAll();
        self::$data['brands'] = $brandModel->findAll();
        

        $this->view('admin/edit-product',self::$data);

        

    }


    public function patch_product($product_id){
        
        $productModel = new Product();

        if($productModel->validate($_POST)){
           
         

            if(isset($_FILES['main_image'])){
                $image = $productModel->upload_image($_FILES['main_image']);
                    if($image){
                        $_POST['main_image'] = $image;
                    }       
            }

            $_POST['sale_price']  = isset($_POST['sale_price']) && !empty($_POST['sale_price']) ? $_POST['sale_price'] : 0.00;
            $_POST['on_sale'] = isset($_POST['on_sale']) ? 1 : 0;
            $_POST['on_stock'] = isset($_POST['on_stock']) ? 1 : 0;

            
            $res = $productModel->update($product_id,$_POST);
            
            if($res){
               $response = new stdClass();
               $response->status = true;
               echo json_encode($response);
            }else{
                $response = new stdClass();
               $response->status = false;
               echo json_encode($response);
            }
      

        }else{

            $response = new stdClass();
            $response->status = false;
            $response->errors = $productModel->errors;
            
            echo json_encode($response);

        }

    }
}