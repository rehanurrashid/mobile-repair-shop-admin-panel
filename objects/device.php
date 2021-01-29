<?php
class Device{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_devices";
 
    // object properties
    public $device_id;
    public $device_name;
    public $device_model;
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
    function readOne($did){
        $query = "SELECT * FROM " . $this->table_name . " WHERE did= ".$did;
        
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
        
        return $stmt;
    }
    // read categories
    function read_dropdown(){
     
        $query = "SELECT did,name FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    public function create()
    {
        $select = "SELECT name FROM " . $this->table_name." WHERE name = '$this->device_name'";
            
        // prepare query statement
        $stmt = $this->conn->prepare($select);
     
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num==0){
            $query = "INSERT INTO tbl_devices (name,model) VALUES ('$this->device_name','$this->device_model')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->device_id=$id;
                
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
        $query = "UPDATE tbl_devices SET name = '$this->device_name' , model ='$this->device_model' WHERE did = '$this->device_id'";

        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->device_id=$id;
                
            return true;
        }
            return false;
    }
    public function deleteAll($device_id)
    {
            // query to delete record
            $length = sizeof($device_id);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE did = ".$device_id[$i];
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
    public function delete($device_id)
    {
          
                $query = "DELETE FROM " . $this->table_name ." WHERE did = ".$device_id;
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
