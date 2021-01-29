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
    $data = json_decode(file_get_contents("php://input"));

    if(!empty($data->rid)){
       $req->req_rid                 = $data->rid; 
    }
    else{
        // $req->req_rid                 ="Null";
    }
    if(!empty($data->did)){
        $req->req_did                 = $data->did;
    }
    else{
       // $req->req_did                 = "Null"; 
    }

    if(!empty($data->damage_reason)){
        $req->req_damage_reason         = $data->damage_reason;
    }
    else{
        // $req->req_damage_reason         = "Null";
    }
    if(!empty($data->device)){
        $req->req_device                = $data->device;
    }
    else{
        // $req->req_device                = "Null";
    }
    
    // set product property values
    if($data->warranty == "yes" && $data->accessories != "yes" && $data->ip == "yes")
    {
        
        $req->req_uid                 = $data->uid;
        $req->req_front_image         = $data->device_front_image;
        $req->req_back_image          = $data->device_back_image;

        $req->req_warranty            = $data->warranty;
        $req->req_warranty_image      = $data->warranty_image;

        $req->req_backup              = $data->backup;

        $req->req_ip                  = $data->ip;
        $req->req_ip_settings         = $data->ip_settings;
        $req->req_ip_settings_image   = $data->ip_settings_image;

        $req->req_accessories         = $data->accessories;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');
        

        // create
        if($req->create()){
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
    }
    elseif($data->warranty == "yes" && $data->accessories == "yes" && $data->ip == "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;
        $req->req_warranty_image        = $data->warranty_image;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;
        $req->req_ip_settings           = $data->ip_settings;
        $req->req_ip_settings_image     = $data->ip_settings_image;

        $req->req_accessories           = $data->accessories;
        $req->req_accessories_image     = $data->accessories_image;
        $req->req_accessories_detail    = $data->accessories_detail;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    }
    elseif($data->warranty != "yes" && $data->accessories != "yes" && $data->ip != "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;
        $req->req_warranty              = $data->warranty;
        $req->req_backup                = $data->backup;
        $req->req_ip                    = $data->ip;
        $req->req_accessories           = $data->accessories;
        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    }
    elseif($data->warranty == "yes" && $data->accessories == "yes" && $data->ip != "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;
        $req->req_warranty_image        = $data->warranty_image;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;

        $req->req_accessories           = $data->accessories;
        $req->req_accessories_image     = $data->accessories_image;
        $req->req_accessories_detail    = $data->accessories_detail;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    }
    elseif($data->warranty != "yes" && $data->accessories == "yes" && $data->ip == "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;
        $req->req_ip_settings           = $data->ip_settings;
        $req->req_ip_settings_image     = $data->ip_settings_image;

        $req->req_accessories           = $data->accessories;
        $req->req_accessories_image     = $data->accessories_image;
        $req->req_accessories_detail    = $data->accessories_detail;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    } 
    elseif($data->warranty == "yes" && $data->accessories != "yes" && $data->ip != "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;
        $req->req_warranty_image        = $data->warranty_image;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;

        $req->req_accessories           = $data->accessories;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    } 
    elseif($data->warranty != "yes" && $data->accessories != "yes" && $data->ip == "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;
        $req->req_ip_settings           = $data->ip_settings;
        $req->req_ip_settings_image     = $data->ip_settings_image;

        $req->req_accessories           = $data->accessories;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    } 
    elseif($data->warranty != "yes" && $data->accessories == "yes" && $data->ip != "yes")
    {
        $req->req_uid                   = $data->uid;
        $req->req_front_image           = $data->device_front_image;
        $req->req_back_image            = $data->device_back_image;

        $req->req_warranty              = $data->warranty;

        $req->req_backup                = $data->backup;

        $req->req_ip                    = $data->ip;

        $req->req_accessories           = $data->accessories;
        $req->req_accessories_image     = $data->accessories_image;
        $req->req_accessories_detail    = $data->accessories_detail;

        $req->req_receivedOrSent        = "notReceived";
        $req->req_device_status         = "diagnose";
        $req->req_request_time          = date('Y-m-d H:i:s');

        // create
        if($req->create()){
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
    }    
?>