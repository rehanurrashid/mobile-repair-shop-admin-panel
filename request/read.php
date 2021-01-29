<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/request.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $req = new Request($db);
    
            $id = 0;
            $rid = 0;
            $did = 0;
            $uid = 0;
            $reason =0;
            $device_name="";
            $first_name="";
            $last_name="";
            $device_front_image="";
            $device_back_image="";
            $warranty="";
            $warranty_image="";
            $import_data="";
            $ip="";
            $ip_settings="";
            $ip_settings_image="";
            $accessories="";
            $accessories_image="";
            $accessories_details="";
            $device_status="";
            $receivedorsent="";
            $device_receive_time="";
            $device_sent_time="";
            $repair_price="";
            $repair_time="";
            $request_time="";
            $damage_reason="";
            $device="";
            $user_approval="";

    if(isset($_GET['id'])){
        $id =$_GET['id'];
        $stmt = $req->readOne($id);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // req array
            $req_arr=array();
            $req_arr["records"]=array();
            
            

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $req_item=array(
                    "id"                    => $id,
                    "rid"                   => $rid,
                    "did"                   => $did,
                    "uid"                   => $uid,
                    "reason"                => $reason,
                    "device_name"           => $device_name,
                    "first_name"            => $first_name,
                    "last_name"             => $last_name,
                    "device_front_image"    => $device_front_image,
                    "device_back_image"     => $device_back_image,
                    "warranty"              => $warranty,
                    "warranty_image"        => $warranty_image,
                    "import_data"           => $import_data,
                    "ip"                    => $ip,
                    "ip_settings"           => $ip_settings,
                    "ip_settings_image"     => $ip_settings_image,
                    "accessories"           => $accessories,
                    "accessories_image"     => $accessories_image,
                    "accessories_details"   => $accessories_details,
                    "device_status"         => $device_status,
                    "receivedorsent"        => $receivedorsent,
                    "device_receive_time"   => $device_receive_time,
                    "device_sent_time"      => $device_sent_time,
                    "repair_price"          => $repair_price,
                    "repair_time"           => $repair_time,
                    "request_time"          => $request_time,
                    "device_sent_time"      => $device_sent_time,
                    "user_approval"         => $user_approval,
                    "damage_reason"         => $damage_reason,
                    "device"                => $device
                );
         
                array_push($req_arr["records"], $req_item);
            }
         
            echo json_encode($req_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No request found.")
            );
        }
    }
    elseif(isset($_GET['uid']) && !isset($_GET['token'])){
        $req_uid  = $_GET['uid'];
        $stmt   = $req->readUserRequest($req_uid);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // req array
            $req_arr=array();
            $req_arr["records"]=array();
            

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $req_item=array(
                    "id"                    => $id,
                    "rid"                   => $rid,
                    "did"                   => $did,
                    "uid"                   => $uid,
                    "reason"                => $reason,
                    "device_name"           => $device_name,
                    "first_name"            => $first_name,
                    "last_name"             => $last_name,
                    "device_front_image"    => $device_front_image,
                    "device_back_image"     => $device_back_image,
                    "warranty"              => $warranty,
                    "warranty_image"        => $warranty_image,
                    "import_data"           => $import_data,
                    "ip"                    => $ip,
                    "ip_settings"           => $ip_settings,
                    "ip_settings_image"     => $ip_settings_image,
                    "accessories"           => $accessories,
                    "accessories_image"     => $accessories_image,
                    "accessories_details"   => $accessories_details,
                    "device_status"         => $device_status,
                    "receivedorsent"        => $receivedorsent,
                    "device_receive_time"   => $device_receive_time,
                    "device_sent_time"      => $device_sent_time,
                    "repair_price"          => $repair_price,
                    "repair_time"           => $repair_time,
                    "request_time"          => $request_time,
                    "device_sent_time"      => $device_sent_time,
                    "user_approval"         => $user_approval,
                    "damage_reason"         => $damage_reason,
                    "device"                => $device
                );
         
                array_push($req_arr["records"], $req_item);
            }
         
            echo json_encode($req_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No request found.")
            );
        }
    }
    elseif(isset($_GET['uid']) && isset($_GET['token'])){

        $req->req_uid       = $_GET['uid'];
        $req->req_token     = $_GET['token'];
        $stmt   = $req->readUserRequestStatus();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // req array
            $req_arr=array();
            $req_arr["records"]=array();
            
            $id = 0;
            $device_status="";
            $receivedOrSent="";

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $req_item=array(
                    "id"                    => $id,
                    "device_status"         => $device_status,
                    "receivedorsent"        => $receivedOrSent
                );
         
                array_push($req_arr["records"], $req_item);
            }
         
            echo json_encode($req_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No request found.")
            );
        }
    }
    else{
        
        $stmt = $req->read();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // req array
            $req_arr=array();
            $req_arr["records"]=array();
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $req_item=array(
                    "id"                    => $id,
                    "rid"                   => $rid,
                    "did"                   => $did,
                    "uid"                   => $uid,
                    "reason"                => $reason,
                    "device_name"           => $device_name,
                    "first_name"            => $first_name,
                    "last_name"             => $last_name,
                    "device_front_image"    => $device_front_image,
                    "device_back_image"     => $device_back_image,
                    "warranty"              => $warranty,
                    "warranty_image"        => $warranty_image,
                    "import_data"           => $import_data,
                    "ip"                    => $ip,
                    "ip_settings"           => $ip_settings,
                    "ip_settings_image"     => $ip_settings_image,
                    "accessories"           => $accessories,
                    "accessories_image"     => $accessories_image,
                    "accessories_details"   => $accessories_details,
                    "device_status"         => $device_status,
                    "receivedorsent"        => $receivedOrSent,
                    "device_receive_time"   => $device_receive_time,
                    "device_sent_time"      => $device_sent_time,
                    "repair_price"          => $repair_price,
                    "repair_time"           => $repair_time,
                    "request_time"          => $request_time,
                    "device_sent_time"      => $device_sent_time,
                    "user_approval"         => $user_approval,
                    "damage_reason"         => $damage_reason,
                    "device"                => $device
                );
         
                array_push($req_arr["records"], $req_item);
            }
         
            echo json_encode($req_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No requests found.")
            );
        }
    }

?>