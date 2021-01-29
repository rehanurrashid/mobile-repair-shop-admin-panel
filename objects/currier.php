<?php
class Currier{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_currier";
 
    // object properties
    public $cid;
    public $currier_id;
    public $currier_fname;
    public $currier_lname;
    public $currier_email;
    public $currier_phone;
    public $currier_image;
    public $currier_gender;
    public $currier_address;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read categories
    function read(){
     
        $query = "SELECT * FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function readOne($cid){
        $query = "SELECT * FROM " . $this->table_name . " WHERE cid= ".$cid;
        
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function read_dropdown(){
     
        $query = "SELECT cid,first_name,last_name FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    public function create()
    {
        $select = "SELECT currier_id FROM " . $this->table_name." WHERE currier_id = '$this->currier_id'";
            
        // prepare query statement
        $stmt = $this->conn->prepare($select);
     
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num==0){
            $query = "INSERT INTO tbl_currier (currier_id,first_name,last_name,email,phone,image,gender,address) VALUES ('$this->currier_id','$this->currier_fname','$this->currier_lname','$this->currier_email','$this->currier_phone','$this->currier_image','$this->currier_gender','$this->currier_address')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->currier_id=$id;
                
                return true;
            }
            return false;
        }
        else{
            return false;
        }
        
    }
    public function update()
    {
        $query = "UPDATE tbl_currier SET currier_id = '$this->currier_id' , first_name ='$this->currier_fname' , last_name ='$this->currier_lname', email ='$this->currier_email', phone ='$this->currier_phone', image ='$this->currier_image', gender ='$this->currier_gender', address ='$this->currier_address' WHERE cid = '$this->cid'";

        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->currier_id=$id;
                
            return true;
        }
            return false;
        
    }
    public function deleteAll($currier_id)
    {
            // query to delete record
            $length = sizeof($currier_id);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE cid = ".$currier_id[$i];
                // prepare query
                $stmt = $this->conn->prepare($query);
                
                // execute query
                if($stmt->execute())
                {
                    $count++;
                }
                else
                {
                    return false;
                }
            }

            if($count==$length){
                return true;
            }
            else{
                return false;
            }
    }
    public function delete($currier_id)
    {
          
                $query = "DELETE FROM " . $this->table_name ." WHERE cid = ".$currier_id;
                // prepare query
                $stmt = $this->conn->prepare($query);
                
                // execute query
                if($stmt->execute())
                {
                    return true;
                }
                else
                {
                    return false;
                }

    }
};
