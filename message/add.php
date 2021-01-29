<?php
    // msguired headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-msguested-With");
     
    // get database connection
    include_once '../config/database.php';
     
    // instantiate object
    include_once '../objects/message.php';
     
    $database = new Database();
    $db = $database->getConnection();
     
    $msg = new Message($db);

    // get msged data
    $data = json_decode(file_get_contents("php://input"));

    // set product property values
        $msg->uid           = $data->uid;
        $msg->message       = $data->message;
        $msg->recording     = $data->recording;
        $msg->image         = $data->image;
        $msg->msg_date      = date('Y-m-d H:i:s');

        // create
        if($msg->create()){
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