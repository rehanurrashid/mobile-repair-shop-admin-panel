<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/message.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $msg = new Message($db);
    
    if(isset($_GET['token'])){

        $msg_id = $_GET['mid'];

         // delete
        $check = $msg->delete($msg_id);
        if($check){
            header("location: ../manage_messages.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_messages.php?message=notdeleted");
        } 
    }
    else
    {   
        $msg_id = $_GET['mid'];
        $check = $msg->deleteAll($msg_id);

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