<?php
class Reason{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_reasons";
 
    // object properties
    public $reason_id;
    public $reason_name;
    public $reason_description;
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
    function readOne($rid){
        $query = "SELECT * FROM " . $this->table_name . " WHERE rid= ".$rid;
        
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
     function read_dropdown(){
     
        $query = "SELECT rid,reason FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    public function create()
    {
        $select = "SELECT reason FROM " . $this->table_name." WHERE reason = '$this->reason_name'";
            
        // prepare query statement
        $stmt = $this->conn->prepare($select);
     
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num==0){
            $query = "INSERT INTO tbl_reasons (reason,description) VALUES ('$this->reason_name','$this->reason_description')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->reason_id=$id;
                
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
        $query = "UPDATE tbl_reasons SET reason = '$this->reason_name' , description ='$this->reason_description' WHERE rid = '$this->reason_id'";

        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->reason_id=$id;
                
            return true;
        }
            return false;
        
    }
    public function deleteAll($reason_id)
    {
            // query to delete record
            $length = sizeof($reason_id);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE rid = ".$reason_id[$i];
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
    public function delete($reason_id)
    {
          
                $query = "DELETE FROM " . $this->table_name ." WHERE rid = ".$reason_id;
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
