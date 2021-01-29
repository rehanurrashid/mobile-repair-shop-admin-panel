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

    // $content = file_get_contents("php://input");
    // $decoded = json_decode($content, true);

    $device->device_name = $_POST['name'];
    $device->device_model = $_POST['model'];

    if(!empty($device->device_name)){
            // create
            $check = $device->create();
            if($check){
                 header("location: ../manage_devices.php?message=true");
            }
             else if($check=="exists"){
                header("location: ../manage_devices.php?message=exists");
             }
            // if unable to create
            else{
                header("location: ../manage_devices.php?message=false");
            }
        }


?>