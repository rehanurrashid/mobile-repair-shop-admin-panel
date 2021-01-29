<?php
class Employee{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_employees";
 
    // object properties
    public $eid;
    public $emp_id;
    public $emp_fname;
    public $emp_lname;
    public $emp_email;
    public $emp_phone;
    public $emp_image;
    public $emp_gender;
    public $emp_address;
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
    function readOne($eid){
        $query = "SELECT * FROM " . $this->table_name . " WHERE eid= ".$eid;
        
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function read_dropdown(){
     
        $query = "SELECT eid,first_name,last_name FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    public function create()
    {
        $select = "SELECT employee_id FROM " . $this->table_name." WHERE employee_id = '$this->emp_id'";
            
        // prepare query statement
        $stmt = $this->conn->prepare($select);
     
        // execute query
        $stmt->execute();
        $num = $stmt->rowCount();
        if($num==0){
            $query = "INSERT INTO tbl_employees (employee_id,first_name,last_name,email,phone,image,gender,address) VALUES ('$this->emp_id','$this->emp_fname','$this->emp_lname','$this->emp_email','$this->emp_phone','$this->emp_image','$this->emp_gender','$this->emp_address')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->emp_id=$id;
                
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
        $query = "UPDATE tbl_employees SET employee_id = '$this->emp_id' , first_name ='$this->emp_fname' , last_name ='$this->emp_lname', email ='$this->emp_email', phone ='$this->emp_phone', image ='$this->emp_image', gender ='$this->emp_gender', address ='$this->emp_address' WHERE eid = '$this->eid'";

        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->emp_id=$id;
                
            return true;
        }
            return false;
        
    }
    public function deleteAll($emp_id)
    {
            // query to delete record
            $length = sizeof($emp_id);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE eid = ".$emp_id[$i];
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
    public function delete($emp_id)
    {
          
                $query = "DELETE FROM " . $this->table_name ." WHERE eid = ".$emp_id;
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
