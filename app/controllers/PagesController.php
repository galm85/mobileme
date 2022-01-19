<?php


 Class PagesController extends MainController{


    public function index(){
        self::$data['title'] .= 'Home';
        $this->view('pages/home',self::$data);
    }
 }