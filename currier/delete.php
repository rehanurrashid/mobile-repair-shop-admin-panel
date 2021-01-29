<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/currier.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $currier = new Currier($db);
    
    if(isset($_GET['token'])){

        $currier_id = $_GET['cid'];

         // delete
        $check = $currier->delete($currier_id);
        if($check){
            header("location: ../manage_currier.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_currier.php?message=notdeleted");
        } 
    }
    else
    {   
        $currier_id = $_GET['cid'];
        $check = $currier->deleteAll($currier_id);

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