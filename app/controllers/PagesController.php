<?php


 Class PagesController extends MainController{


    public function index(){
        self::$data['title'] .= 'Home';
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
            self::$data['products'] = $product->getProductWithBrand();
        }else{
            self::$data['products'] = $product->getProductsByCategoryAndBrand($brand);
        }
        self::$data['brands'] = $brandModel->findAll();
        self::$data['title'] .= 'Smart Phones';
        $this->view('pages/smartphones',self::$data);
    }


    public function watches(){
        $brandModel = new Brand();
        $product = new Product();
        self::$data['products'] = $product->where('categorie_id',2);
        self::$data['brands'] = $brandModel->findAll();

        self::$data['title'] .= 'Watches & Headsets';
        $this->view('pages/smartphones',self::$data);
    }


 }