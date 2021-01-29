<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
     
    // get database connection
    include_once '../config/database.php';
     
    // instantiate object
    include_once '../objects/request.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $req = new Request($db);

    // get reqed data
    // $data = json_decode(file_get_contents("php://input"));

    // set product property values

        $req->id                 = $_GET['id'];
        $req->req_user_approval  = $_GET['user_approval'];

        // create
        if($req->user_approval()){
            $create =array(

            "message"   => "True"
        );
        }
         
        // if unable to create
        else{
            $create =array(
            "message"   => "False"
        );
        }
        echo json_encode($create); 
?>