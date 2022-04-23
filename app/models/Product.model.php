<?php

    

    class Product extends Database{

        protected $table = 'products';
        public $errors = [];


        public function getProductWithBrand(){
            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b On p.brand_id = b.id";
            $products = $this->query($sql,[]);
            return $products;
        }

        public function getProductsByCategoryAndBrand($brand){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b On p.brand_id = b.id WHERE b.title ='$brand'";
            $products = $this->query($sql,[]);
            return $products;
        }


        public function validate($data){
            $this->errors = [];
           

            if(!isset($data['title']) || $data['title'] === ''){
                $this->errors['title'] = '* Please insert a Product Title';
            }

            if(!isset($data['categorie_id']) || !is_numeric($data['categorie_id'])){
                $this->errors['categorie_id'] = '* Please Select a Category';
            }

            if(!isset($data['brand_id']) || !is_numeric($data['brand_id'])){
                $this->errors['brand_id'] = '* Please Select a Brand';
            }

            if(!isset($data['price']) || $data['price'] === ''){
                $this->errors['price'] = '* Please Insert a Price';
            }

            if(isset($data['on_sale']) && ( !isset($data['sale_price']) || $data['sale_price'] == '' ) ){
                $this->errors['sale_price'] = '* Please Insert a Sale Price';
            }

            if(!isset($data['summery']) || $data['summery'] === ''){
                $this->errors['summery'] = '* Please Insert a summery';
            }

            if(!isset($data['article']) || $data['article'] === ''){
                $this->errors['article'] = '* Please Insert a article';
            }

            if(!empty($this->errors)){
                return false;
            }

            return true;
            

        }


        public function upload_image($data){
            $file_name = $data['name'];
            $file_name = time() . '-' . $file_name;
            $tmp_name = $data['tmp_name'];
            $local_folder = './assets/images/products/';
            if(move_uploaded_file($tmp_name,$local_folder.$file_name)){
                return $file_name;
            }else{
  
                return false;
            }
            
        }


        public function getSales(){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b ON b.id = p.brand_id WHERE p.categorie_id = 1 AND p.on_sale = 1 LIMIT 5";
            $products = $this->query($sql);
            return $products;
        }
        public function getNew(){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b ON b.id = p.brand_id WHERE p.categorie_id = 1 ORDER BY created_at DESC LIMIT 5";
            $products = $this->query($sql);
            return $products;
        }


        public function getAllSamerphones(){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b ON b.id = p.brand_id WHERE p.categorie_id = 1";
            $products = $this->query($sql);
            return $products;

        }

        

        public function getAllSamerphonesByBrand($brand){
            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b On p.brand_id = b.id WHERE p.categorie_id = 1 AND b.title ='$brand'";
            $products = $this->query($sql);
            return $products;

        }


        public function getAllWatches(){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b ON b.id = p.brand_id WHERE p.categorie_id = 2";
            $products = $this->query($sql);
            return $products;

        }

        public function getAllWatchesByBrand($brand){
            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b On p.brand_id = b.id WHERE p.categorie_id = 2 AND b.title ='$brand'";
            $products = $this->query($sql);
            return $products;

        }
        
        
        public function getAllAccessories(){

            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b ON b.id = p.brand_id WHERE p.categorie_id = 3";
            $products = $this->query($sql);
            return $products;

        }


        public function getAllAccessoriesByBrand($brand){
            $sql = "SELECT p.*,b.title as brand_title FROM products p LEFT JOIN brands b On p.brand_id = b.id WHERE p.categorie_id = 3 AND b.title ='$brand'";
            $products = $this->query($sql);
            return $products;

        }
             
        

        public function updateProduct($id,$data){
           
            $category_id = $data['categorie_id'];
            $brand_id = $data['brand_id'];
            $title = $data['title'];
            $article = $data['article'];
            $summery = $data['summery'];
            isset($data['on_sale'])? $on_sale = $data['on_sale'] : '';
            isset($data['on_stock'])? $on_sale = $data['on_stock'] : '';
            
            $price = $data['price'];
            if(isset($data['main_image'])){
                $main_image = $data['main_image'];
            }
            if(isset($data['sale_price'])){
                $sale_price = $data['sale_price'];
            }
            $sql = "UPDATE products SET categorie_id = '$category_id', brand_id = '$brand_id', title='$title' ,article = '$article', summery = '$summery',price='$price' WHERE id = $id ";
            $this->query($sql,null,'update');

        }


        public function searchProduct($search){

            $sql2 = "SELECT p.*,b.title as brand_title,c.title as category_title FROM products p 
                     LEFT JOIN brands b ON p.brand_id = b.id 
                     LEFT JOIN categories c ON p.categorie_id = c.id
                     WHERE p.title LIKE concat('%' , ?, '%')";
            $products = $this->query($sql2,[$search]);
            return $products;
        }

    }





    