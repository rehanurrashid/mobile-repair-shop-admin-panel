<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/reason.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $reason = new Reason($db);
     
    if(isset($_GET['rid'])){
        $rid =$_GET['rid'];
        $stmt = $reason->readOne($rid);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // reason array
            $reason_arr=array();
            $reason_arr["records"]=array();
            
            $rid =0;
            $reason="";
            $description="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $reason_item=array(
                    "rid" => $rid,
                    "reason" => $reason,
                    "description" => $description
                );
         
                array_push($reason_arr["records"], $reason_item);
            }
         
            echo json_encode($reason_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Reasons found.")
            );
        }
    }
    else{
        
        $stmt = $reason->read();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // reason array
            $reason_arr=array();
            $reason_arr["records"]=array();
            
            $rid =0;
            $reason="";
            $description="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $reason_item=array(
                    "rid" => $rid,
                    "reason" => $reason,
                    "description" => $description
                );
         
                array_push($reason_arr["records"], $reason_item);
            }
         
            echo json_encode($reason_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Reasons found.")
            );
        }
    }

?>