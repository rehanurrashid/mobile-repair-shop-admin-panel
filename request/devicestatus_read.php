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
     
    if(isset($_GET['id'])){
        if(isset($_GET['token'])){

            $req->req_token =$_GET['token'];
            $id =$_GET['id'];

            $stmt = $req->readOneDeviceStatus($id);
            $num = $stmt->rowCount();
            
            // check if more than 0 record found
            if($num>0){
                
                // req array
                $req_arr=array();
                $req_arr["records"]=array();
                
                $id = 0;
                $cid = 0;
                $eid = 0;
                $receivedorsent ="";
                $pickup_time="";
                $device_receive_time="";
                $device_sent_time="";
                $e_first_name="";
                $e_last_name="";
                $e_phone="";
                $e_image="";
                $c_first_name="";
                $c_last_name="";
                $c_phone="";
                $c_image="";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
             
                    $req_item=array(
                        "id"                    => $id,
                        "cid"                   => $cid,
                        "eid"                   => $eid,
                        "receivedorsent"        => $receivedorsent,
                        "pickup_time"           => $pickup_time,
                        "device_receive_time"   => $device_receive_time,
                        "e_first_name"          => $e_first_name,
                        "e_last_name"           => $e_last_name,
                        "e_phone"               => $e_phone,
                        "e_image"               => $e_image,
                        "c_first_name"          => $c_first_name,
                        "c_last_name"           => $c_last_name,
                        "c_phone"               => $c_phone,
                        "c_image"               => $c_image
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
            $id =$_GET['id'];
            $stmt = $req->readOneDeviceStatus($id);
            $num = $stmt->rowCount();
            
            // check if more than 0 record found
            if($num>0){
                
                // req array
                $req_arr=array();
                $req_arr["records"]=array();
                
                $id = 0;
                $device_status="";
                $repair_price="";
                $diagnose_price ="";
                $repair_time="";
                $defect_details ="";
                $defect_image ="";
                $receivedorsent ="";

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    extract($row);
             
                    $req_item=array(
                        "id"                 => $id,
                        "device_status"      => $device_status,
                        "receivedorsent"     => $receivedorsent,
                        "repair_price"       => $repair_price,
                        "diagnose_price"     => $diagnose_price,
                        "repair_time"        => $repair_time,
                        "defect_details"     => $defect_details,
                        "defect_image"       => $defect_image
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
    }

?>