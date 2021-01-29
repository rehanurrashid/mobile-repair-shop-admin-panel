<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/device.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $device = new Device($db);
    // echo json_encode($_GET['did']);exit;
    if(isset($_GET['did'])){
        $did =$_GET['did'];
        $stmt = $device->readOne($did);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // device array
            $device_arr=array();
            $device_arr["records"]=array();
            
            $did =0;
            $name="";
            $model="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $device_item=array(
                    "did" => $did,
                    "name" => $name,
                    "model" => $model
                );
         
                array_push($device_arr["records"], $device_item);
            }
         
            echo json_encode($device_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Devices found.")
            );
        }
    }
    else{
        
        $stmt = $device->read();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // device array
            $device_arr=array();
            $device_arr["records"]=array();
            
            $did =0;
            $name="";
            $model="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $device_item=array(
                    "did" => $did,
                    "name" => $name,
                    "model" => $model
                );
         
                array_push($device_arr["records"], $device_item);
            }
         
            echo json_encode($device_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Devices found.")
            );
        }
    }

?>