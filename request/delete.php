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
    
    if(isset($_GET['token'])){

        $req_id = $_GET['id'];

         // delete
        $check = $req->delete($req_id);
        if($check){
            header("location: ../manage_requests.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_requests.php?message=notdeleted");
        } 
    }
    else
    {   
        $req_id = $_GET['id'];
        $check = $req->deleteAll($req_id);

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