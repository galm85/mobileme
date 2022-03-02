<?php


    class Order extends Database{

        protected $table = 'orders';
        public $errors = [];

        public function validateNewOrder($data){
            $validate = true;
            $errors = [];

            if($data['first_name']==''){
                $validate = false;
                $errors['first_name'] = 'Please Insert First Name';
            }
            if($data['last_name']==''){
                $validate = false;
                $errors['last_name'] = 'Please Insert Last Name';
            }
            if($data['email']==''){
                $validate = false;
                $errors['email'] = 'Please Insert Email';
            }
            if($data['phone']==''){
                $validate = false;
                $errors['phone'] = 'Please Insert Phone';
            }
            if($data['address']==''){
                $validate = false;
                $errors['address'] = 'Please Insert Shipment Address';
            }
            if($data['credit_card']==''){
                $validate = false;
                $errors['credit_card'] = 'Please Select Credit Card';
            }
            if($data['card_holder']==''){
                $validate = false;
                $errors['card_holder'] = 'Please Insert Card Holder';
            }
            if($data['card_number']==''){
                $validate = false;
                $errors['card_number'] = 'Please Insert Card Number';
            }
            if($data['ccv_number']==''){
                $validate = false;
                $errors['ccv_number'] = 'Please Insert CCV Number';
            }
            if($data['exp_month']==''){
                $validate = false;
                $errors['exp_month'] = 'Please Select Month exp date';
            }
            if($data['exp_year']==''){
                $validate = false;
                $errors['exp_year'] = 'Please Select Year exp date';
            }

            if($validate){
                return true;
            }else{
                $this->errors = $errors;
                return false;
            }
        }



    }





    