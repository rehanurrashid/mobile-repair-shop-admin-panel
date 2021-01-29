<?php
class Message{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_messages";
 
    // object properties
    public $mid;
    public $uid;
    public $message;
    public $recording;
    public $image;
    public $msg_date;
    public $req_token;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read categories
    function read(){
     
        $query = "SELECT mid,uid,message,recording,image,msg_date,

        (SELECT first_name FROM tbl_users WHERE tbl_messages.uid=tbl_users.uid) as first_name,
        
        (SELECT last_name FROM tbl_users WHERE tbl_messages.uid=tbl_users.uid) as last_name

        FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function readOne($mid){
        
        $query = "SELECT mid,uid,message,recording,image,msg_date,

        (SELECT first_name FROM tbl_users WHERE tbl_messages.uid=tbl_users.uid) as first_name,

        (SELECT last_name FROM tbl_users WHERE tbl_messages.uid=tbl_users.uid) as last_name

        FROM " . $this->table_name . " WHERE mid= ".$mid;
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    public function create()
    {
            $query = "INSERT INTO tbl_messages (uid,message,recording,image,msg_date) 
            VALUES ('$this->uid','$this->message','$this->recording','$this->image','$this->msg_date')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->mid=$id;
                
                return true;
            }
            return false;
        
    }
    public function update()
    {
        $query = "UPDATE tbl_requests SET message = '$this->message' , recording ='$this->recording' , image ='$this->image'

            WHERE mid = '$this->mid'";
        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->mid=$id;
                
            return true;
        }
            return false;
        
    }

    public function deleteAll($mid)
    {
            // query to delete record
            $length = sizeof($mid);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE mid = ".$mid[$i];
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
    public function delete($mid)
    {
          
        $query = "DELETE FROM " . $this->table_name ." WHERE mid = ".$mid;
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
