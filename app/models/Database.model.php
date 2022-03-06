<?php

    class Database{

        public $errors = [];
        

        public function __construct(){
            
            if(!property_exists($this,'table')){
                $this->table = strtolower(get_class($this)).'s';
            }
        }


        public function connect(){
            try{
                $db = new PDO('mysql:host=localhost;dbname=mobile-me','root','');
                return $db;
            }catch(PDOException $e){
                echo $e;
            }
        }


       



        /**
         * @param String $query - The Query for the database
         * @param Array $data - array of data for the query
         * @param String $type - type of the query result (default as FATCH)
         */
        public function query($query,$data=[],$type='fetch'){

            // echo '<pre> <br>';
            // echo $query;
            // echo '<br>';
            // print_r($data);
            // die;
         
            try{
                $db = $this->connect();
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            
                $statement = $db->prepare($query);
                $check = $statement->execute($data);
                
                if($check && $type === 'fetch'){
                    $results = $statement->fetchAll(PDO::FETCH_OBJ);
                    return $results;
                }

                return $check;

            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }



        public function findAll($order='ASC'){
            $table = $this->table;
            $db = $this->connect();
            $results = $db->query("SELECT * FROM $table ORDER BY created_at  $order")->fetchAll(PDO::FETCH_OBJ);
            return $results;   
        }


        public function where($column,$value,$order=null){
            // $column = addslashes($column);
            if($order){
                $query = "SELECT * FROM $this->table WHERE $column = :value ORDER BY created_at DESC";

            }else{
                $query = "SELECT * FROM $this->table WHERE $column = :value";

            }
            $data = $this->query($query,['value'=>$value]);
            return $data;
        }

        public function single($column,$value){
            try{
                $db = $this->connect();
                $statement = $db->prepare("SELECT * FROM $this->table WHERE $column =:value");
               
                $check = $statement->execute(['value'=>$value]);
                if($check){
                    $data = $statement->fetch(PDO::FETCH_OBJ);
                    return $data;
                }
                return $check;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
            
        }


        public function insert($data){

           
            $keys = array_keys($data);
            $columns = implode(',',$keys);
            $values = implode(',:',$keys);
          
            $query = "INSERT INTO $this->table ($columns) VALUES (:$values)";

            $res = $this->query($query,$data,'insert');
           
           return $res;

        }


        public function update($id,$data){

      
            $keys = array_keys($data);     
            $set ="";

            foreach($keys as $key){
                $set .= "$key = :$key,";
            }

            $set = rtrim($set,",");
            $sql = "UPDATE $this->table SET $set  WHERE id = $id";
            $res = $this->query($sql,$data,'update');
            
             return $res;
            
        }

    }

    
