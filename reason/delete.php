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
    
    if(isset($_GET['token'])){

        $reason_id = $_GET['rid'];

         // delete
        $check = $reason->delete($reason_id);
        if($check){
            header("location: ../manage_reasons.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_reasons.php?message=notdeleted");
        } 
    }
    else
    {   
        $reason_id = $_GET['rid'];
        $check = $reason->deleteAll($reason_id);

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