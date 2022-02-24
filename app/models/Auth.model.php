<?php

    Class Auth{


        static public function get_user_image(){
            if($_SESSION['USER']){
                return $_SESSION['USER']->image;
            }
            return null;
        }


        static public function get_user(){
            if(isset($_SESSION['USER'])){
                return $_SESSION['USER'];
            }
            return null;
        }

    }