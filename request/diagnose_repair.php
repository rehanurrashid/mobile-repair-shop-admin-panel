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


    // $content = file_get_contents("php://input");
    // $decoded = json_decode($content, true);
    if(isset($_POST['token']))
    {   
        $req->req_token          = $_POST['token'];
        $req->req_device_status  = $_POST['diagnose_repair'];
        $req->id   =  $_POST['id'];
        $res = $req->updateRepairStatus();
        if($res)
            {       
                // $data['f_status']=$this->Model_Member->checkStatus();
                $data['response']=true;
            }
        else
            {
                $data['response']=false;
            }
        echo json_encode($data);
    }
    else{
        $req->id                    = $_POST['id'];
        $req->req_device_status     = $_POST['diagnose_repair'];
        $req->req_repair_time       = $_POST['repair_date'].' '.$_POST['repair_time'];
        $req->req_repair_price      = $_POST['repair_price'];
        $req->req_fault_details     = $_POST['fault_details'];
        // $req->req_fault_details     = $_POST['fault_image'];

        $res = $req->updateRepairStatus();
        if($res)
            {       
                // $data['f_status']=$this->Model_Member->checkStatus();
                $data['response']=true ;
            }
        else
            {
                $data['response']=false ;
            }
        echo json_encode($data);
    }

?>