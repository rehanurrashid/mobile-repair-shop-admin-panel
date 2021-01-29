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
    
    if(isset($_GET['token'])){

        $device_id = $_GET['did'];

         // delete
        $check = $device->delete($device_id);
        if($check){
            header("location: ../manage_devices.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_devices.php?message=notdeleted");
        } 
    }
    else
    {   
        $device_id = $_GET['did'];
        $check = $device->deleteAll($device_id);

        if($check)
        {    
            $data['response'] = $check;
        }
        else
        {
            $data['response']= $check;
        }
        echo json_encode($data);
    }
       
?>