<?php


    class Helpers{

        static function get_old_value($key,$default=null){
            if(isset($_POST[$key])){
                return $_POST[$key];
            }
            return $default;
        }


        static public function get_old_select($key,$value,$default=null){
            if ( (isset($_POST[$key]) && $_POST[$key] == $value) || ($value == $default) ){
                return 'selected';
            }
            return $default;
        }


        static public function get_old_checkbox($key,$default=null){
            if(( isset($_POST[$key]) && ($_POST[$key] == 'on' || $_POST[$key] == 1))  || ($default == 1 )){
                return 'checked';
            }
            return $default;
        }


        static public function kill($data){
            echo '<pre>';
            print_r($data);
            die;
        }
    }