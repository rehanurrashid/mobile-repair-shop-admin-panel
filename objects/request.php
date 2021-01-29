<?php
class Request{
 
    // database connection and table name
    private $conn;
    private $table_name = "tbl_requests";
 
    // object properties
    public $id;
    public $req_uid;
    public $req_rid;
    public $req_did;
    public $req_eid;
    public $req_cid;
    public $req_front_image;
    public $req_back_image;
    public $req_warranty;
    public $req_warranty_image;
    public $req_backup;
    public $req_ip;
    public $req_ip_settings;
    public $req_ip_settings_image;
    public $req_accessories;
    public $req_accessories_image;
    public $req_accessories_detail;
    public $req_device_status;
    public $req_receivedOrSent;
    public $req_device_receive_time;
    public $req_device_sent_time;
    public $req_repair_price;
    public $req_repair_time;
    public $req_fault_details;
    public $req_fault_image;
    public $req_request_time;
    public $req_sent_time;
    public $req_arrival_time;
    public $req_pickup_time;
    public $req_user_approval;
    public $req_damage_reason;
    public $req_device;
    public $req_token;
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read categories
    function read(){
     
        $query = "SELECT id,rid,did,uid,device_front_image, device_back_image,warranty,warranty_image, import_data,ip,ip_settings, ip_settings_image, accessories, accessories_image, accessories_details,receivedorsent, device_status, device_receive_time , device_sent_time , repair_price , repair_time,request_time, user_approval,damage_reason,device,

        (SELECT first_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as first_name,
        
        (SELECT last_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as last_name,

        (SELECT reason FROM tbl_reasons WHERE tbl_requests.rid=tbl_reasons.rid) as reason,
        
        (SELECT name FROM tbl_devices WHERE tbl_requests.did=tbl_devices.did) as device_name

        FROM " . $this->table_name;
            
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function readOne($id){
        
        $query = "SELECT id,rid,did,uid,device_front_image, device_back_image,warranty,warranty_image, import_data,ip,ip_settings, ip_settings_image, accessories, accessories_image, accessories_details, receivedorsent, device_status, device_receive_time , device_sent_time , repair_price, repair_time ,request_time, user_approval, damage_reason, device,

        (SELECT first_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as first_name,
        
        (SELECT last_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as last_name,

        (SELECT reason FROM tbl_reasons WHERE tbl_requests.rid=tbl_reasons.rid) as reason,
        
        (SELECT name FROM tbl_devices WHERE tbl_requests.did=tbl_devices.did) as device_name

        FROM " . $this->table_name . " WHERE id= ".$id;
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function readUserRequest($req_uid){
        
        $query = "SELECT id,rid,did,uid,device_front_image, device_back_image,warranty,warranty_image, import_data,ip,ip_settings, ip_settings_image, accessories, accessories_image, accessories_details, device_status, receivedorsent, device_receive_time , device_sent_time , repair_price, repair_time ,request_time, damage_reason, device,

        (SELECT first_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as first_name,
        
        (SELECT last_name FROM tbl_users WHERE tbl_requests.uid=tbl_users.uid) as last_name,

        (SELECT reason FROM tbl_reasons WHERE tbl_requests.rid=tbl_reasons.rid) as reason,
        
        (SELECT name FROM tbl_devices WHERE tbl_requests.did=tbl_devices.did) as device_name

        FROM " . $this->table_name . " WHERE uid= ".$req_uid;
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        
        return $stmt;
    }
    function readUserRequestStatus(){
        
        $query = "SELECT id, device_status, receivedorsent

        FROM " . $this->table_name . " WHERE uid= ".$this->req_uid;
        // return $query;
        // prepare query statement
        $stmt = $this->conn->prepare($query);
     
        // execute query
        $stmt->execute();
     
        return $stmt;
    }
    function readOneDeviceStatus($id){

        if(!empty($this->req_token)){

            $query = "SELECT id,eid,cid,receivedorsent, arrival_time,pickup_time,device_receive_time, device_sent_time, 

            (SELECT first_name FROM tbl_employees WHERE tbl_requests.eid=tbl_employees.eid) as e_first_name,
            
            (SELECT last_name FROM tbl_employees WHERE tbl_requests.eid=tbl_employees.eid) as e_last_name,

            (SELECT phone FROM tbl_employees WHERE tbl_requests.eid=tbl_employees.eid) as e_phone,
            
            (SELECT image FROM tbl_employees WHERE tbl_requests.eid=tbl_employees.eid) as e_image,

            (SELECT first_name FROM tbl_currier WHERE tbl_requests.cid=tbl_currier.cid) as c_first_name,
            
            (SELECT last_name FROM tbl_currier WHERE tbl_requests.cid=tbl_currier.cid) as c_last_name,

            (SELECT phone FROM tbl_currier WHERE tbl_requests.cid=tbl_currier.cid) as c_phone,
            
            (SELECT image FROM tbl_currier WHERE tbl_requests.cid=tbl_currier.cid) as c_image
        
            FROM " . $this->table_name . " WHERE id= ".$id;
            // return $query;
            // prepare query statement
            $stmt = $this->conn->prepare($query);
         
            // execute query
            $stmt->execute();
         
            
            return $stmt;
        }
        else{
            $query = "SELECT id,device_status,receivedorsent,repair_price, repair_time, defect_details, defect_image, diagnose_price
        
            FROM " . $this->table_name . " WHERE id= ".$id;
            // return $query;
            // prepare query statement
            $stmt = $this->conn->prepare($query);
         
            // execute query
            $stmt->execute();
         
            
            return $stmt;
        }
        
    }
    public function create()
    {
        $num = 0;
        if($num==0){
            $query = "INSERT INTO tbl_requests 
            (rid,did,uid,device_front_image, device_back_image, warranty,warranty_image, import_data,ip,ip_settings, ip_settings_image, accessories, accessories_image, accessories_details, receivedorsent, device_status, request_time ,damage_reason, device) 
            VALUES ('$this->req_rid','$this->req_did','$this->req_uid','$this->req_front_image','$this->req_back_image','$this->req_warranty','$this->req_warranty_image','$this->req_backup','$this->req_ip','$this->req_ip_settings','$this->req_ip_settings_image','$this->req_accessories','$this->req_accessories_image','$this->req_accessories_detail','$this->req_receivedOrSent','$this->req_device_status','$this->req_request_time','$this->req_damage_reason','$this->req_device')";
            // prepare query
            $stmt = $this->conn->prepare($query);
           
            //echo "\n $query \n";
            
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->req_id=$id;
                
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
        $query = "UPDATE tbl_requests SET uid = '$this->req_uid' , rid ='$this->req_rid' , did ='$this->req_did', device_front_image ='$this->req_front_image', device_back_image ='$this->req_back_image', warranty ='$this->req_warranty',warranty_image ='$this->req_warranty_image', import_data ='$this->req_backup', ip ='$this->req_ip' , ip_settings ='$this->req_ip_settings' , ip_settings_image ='$this->req_ip_settings_image' , accessories ='$this->req_accessories' , accessories_image ='$this->req_accessories_image' , accessories_details ='$this->req_accessories_detail'

            WHERE id = '$this->id'";
        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->req_id=$id;
                
            return true;
        }
            return false;
        
    }
    public function updateReceivedStatus()
    {

        if($this->req_receivedOrSent == "received")
        {
            $query = "UPDATE tbl_requests SET device_receive_time = '$this->req_device_receive_time', eid = '$this->req_eid' , cid = '$this->req_cid' ,receivedorsent = '$this->req_receivedOrSent' WHERE id = '$this->id'";
            // prepare query
            $stmt = $this->conn->prepare($query);
            // return $query;
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->req_id=$id;
                    
                return true;
            }
                return false;
        }
        elseif($this->req_receivedOrSent == "delivered"){
            $query = "UPDATE tbl_requests SET receivedorsent = '$this->req_receivedOrSent' WHERE id = '$this->id'";
            // prepare query

            $stmt = $this->conn->prepare($query);
            // return $query;
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->req_id=$id;
                    
                return true;
            }
                return false;
        }
        else
        if($this->req_receivedOrSent == "sent"){

           if(!empty($this->req_eid)) 
           {
            $query = "UPDATE tbl_requests SET device_sent_time = '$this->req_sent_time', arrival_time = '$this->req_arrival_time', pickup_time = '$this->req_pickup_time', eid = '$this->req_eid' , receivedorsent = '$this->req_receivedOrSent' WHERE id = '$this->id'";
                // prepare query
                $stmt = $this->conn->prepare($query);

                // return $query;
                // execute query
                if($stmt->execute())
                {
                    $id = $this->conn->lastInsertId();
                    $this->req_id=$id;
                        
                    return true;
                }
                    return false;
           }
           else 
            if(!empty($this->req_cid))
            {
            $query = "UPDATE tbl_requests SET device_sent_time = '$this->req_sent_time', arrival_time = '$this->req_arrival_time', pickup_time = '$this->req_pickup_time', cid = '$this->req_cid' ,receivedorsent = '$this->req_receivedOrSent' WHERE id = '$this->id'";
                // prepare query
                $stmt = $this->conn->prepare($query);
                // return $query;
                // execute query
                if($stmt->execute())
                {
                    $id = $this->conn->lastInsertId();
                    $this->req_id=$id;
                        
                    return true;
                }
                    return false;
           }
        }
    }
    public function updateRepairStatus()
    {
        if(!empty($this->req_token)){

            $query = "UPDATE tbl_requests SET device_status = '$this->req_device_status' WHERE id = '$this->id'";
            // prepare query
            $stmt = $this->conn->prepare($query);
            // return $query;
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->req_id=$id;
                    
                return true;
            }
                return false;
        }
        else
        {
            $query = "UPDATE tbl_requests SET device_status = '$this->req_device_status', repair_time = '$this->req_repair_time', repair_price = '$this->req_repair_price', defect_details = '$this->req_fault_details', defect_image = '$this->req_fault_image' WHERE id = '$this->id'";
            // prepare query
            $stmt = $this->conn->prepare($query);
            // return $query;
            // execute query
            if($stmt->execute())
            {
                $id = $this->conn->lastInsertId();
                $this->req_id=$id;
                    
                return true;
            }
                return false;
        }
    }
     public function user_approval()
    {
        $query = "UPDATE tbl_requests SET user_approval = '$this->req_user_approval' WHERE id = '$this->id'";
        // prepare query
        $stmt = $this->conn->prepare($query);
            
        // execute query
        if($stmt->execute())
        {
            $id = $this->conn->lastInsertId();
            $this->req_id=$id;
                
            return true;
        }
            return false;
        
    }
    public function deleteAll($req_id)
    {
            // query to delete record
            $length = sizeof($req_id);
            $count=0;

            for ($i=0; $i < $length; $i++) 
            {
                $query = "DELETE FROM " . $this->table_name ." WHERE id = ".$req_id[$i];
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
    public function delete($req_id)
    {
          
        $query = "DELETE FROM " . $this->table_name ." WHERE id = ".$req_id;
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
