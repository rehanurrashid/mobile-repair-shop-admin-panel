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

    // $content = file_get_contents("php://input");
    // $decoded = json_decode($content, true);

    $reason->reason_id = $_POST['rid'];
    $reason->reason_name = $_POST['reason'];
    $reason->reason_description = $_POST['shortdescription'];

    if(!empty($reason->reason_name)){
            // create
            $check = $reason->update();
            if($check){
                 header("location: ../manage_reasons.php?message=editsucessfully");
            }
            // if unable to create
            else{
                header("location: ../manage_reasons.php?message=editunsucessfull");
            }
        }

?>