<?php


 Class AdminController extends MainController{


    public function index(){
        self::$data['title'] .= 'Admin Panel';
        
        
        $this->view('admin/dashboard',self::$data);
    }


    public function products($brand=null,$item=null){

        $productModel = new Product();

        $query = "SELECT p.*,c.title as category,b.title as brand FROM products p 
                  LEFT JOIN categories c ON p.categorie_id = c.id
                  LEFT JOIN brands b ON p.brand_id = b.id";
        

        $products = $productModel->query($query);
        
       
        
        self::$data['title'] .= 'Admin - Products';
        self::$data['products'] = $products;
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


 

}