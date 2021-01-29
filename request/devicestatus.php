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
    if(isset($_POST['received_date']) && isset($_POST['received_time']))
    {
        $req->req_device_receive_time  = $_POST['received_date'].' '.$_POST['received_time'];
        $req->req_receivedOrSent       = $_POST['receivedorsent'];
        $req->id   = $_POST['id'];
        $res = $req->updateReceivedStatus();
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
    elseif(!empty($_POST['eid'])){

        $req->req_sent_time     = $_POST['sent_date'].' '.$_POST['sent_time'];
        $req->req_arrival_time  = $_POST['arrival_date'].' '.$_POST['arrival_time'];
        $req->req_pickup_time   = $_POST['pickup_date'].' '.$_POST['pickup_time'];
        $req->req_receivedOrSent    = $_POST['receivedorsent'];
        $req->id   = $_POST['id'];
        $req->req_eid   = $_POST['eid'];
        $res = $req->updateReceivedStatus();
        if($res)
            {       
                // $data['f_status']=$this->Model_Member->checkStatus();
                $data['response']=$res;
            }
        else
            {
                $data['response']=$res;
            }
        echo json_encode($data);
    }
    elseif(!empty($_POST['cid'])){

        $req->req_sent_time     = $_POST['sent_date'].' '.$_POST['sent_time'];
        $req->req_arrival_time  = $_POST['arrival_date'].' '.$_POST['arrival_time'];
        $req->req_pickup_time   = $_POST['pickup_date'].' '.$_POST['pickup_time'];
        $req->req_receivedOrSent    = $_POST['receivedorsent'];
        $req->id   = $_POST['id'];
        $req->req_cid   = $_POST['cid'];
        $res = $req->updateReceivedStatus();
        if($res)
            {       
                // $data['f_status']=$this->Model_Member->checkStatus();
                $data['response']=$res;
            }
        else
            {
                $data['response']=$res;
            }
        echo json_encode($data);
    }
    else{
        $req->req_receivedOrSent    = $_POST['receivedorsent'];
        $req->id   = $_POST['id'];
        $res = $req->updateReceivedStatus();
        if($res)
            {       
                // $data['f_status']=$this->Model_Member->checkStatus();
                $data['response']=$res;
            }
        else
            {
                $data['response']=$res;
            }
        echo json_encode($data);
    }

    


?>