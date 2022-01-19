<?php


    class App{

        protected $controller = 'Pages';
        protected $method = 'index';
        protected $params = [];

        public function __construct(){
            $url = $this->getUrl();
           
        

            if(file_exists("../app/controllers/".ucfirst($url[0])."Controller.php")){
                $this->controller = ucfirst($url[0]);
                unset($url[0]);
            }
            

            //Controller handler
            require_once '../app/controllers/'.$this->controller.'Controller.php';
            $this->controller = $this->controller."Controller";
            $this->controller = new $this->controller();


            // Method handler
            $url = array_values($url);
            if(isset($url[0])){
                if(method_exists($this->controller,$url[0])){
                    $this->method = $url[0];
                    unset($url[0]);
                }
            }

            // Params Methods
            $this->params = array_values($url);
            

            call_user_func_array([$this->controller,$this->method],$this->params);  //Example: PagesController->index(param1,param2);


        }







        /**
         * Break the url to array
         * 
         * @return Array of The url as string
         */
        private function getUrl(){
            $url = isset($_GET['url']) ? $_GET['url'] : "Pages";
            $url = trim($url);
            $url = filter_var($url,FILTER_SANITIZE_URL);
            $url = explode('/',$url);
            return $url;
        }

}