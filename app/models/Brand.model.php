<?php


    class Brand extends Database{

        protected $table = 'brands';
        

        public function upload_image($data){
            $file_name = $data['name'];
            $file_name = time() . '-' . $file_name;
            $tmp_name = $data['tmp_name'];
            $local_folder = './assets/images/brands/';
            if(move_uploaded_file($tmp_name,$local_folder.$file_name)){
                return $file_name;
            }else{
  
                return false;
            }
            
        }



    }





    