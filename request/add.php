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
    // code for image 
    $save_file_path_db = "upload/images";
    $target_dir="../upload/images";
    if(!file_exists($target_dir)){
        mkdir($target_dir,0777,true);
    }

     // device front image upload
        $device_front_image = $_FILES['device_front_image']['name'];
        $f_tmp_front = $_FILES['device_front_image']['tmp_name'];

        $f_extension_front = explode('.', $device_front_image); //explode() convert string into array form.
        $f_extension_front = strtolower(end($f_extension_front)); // end() show the last index result of array.
        $f_newfile_front = rand().'_'.time().".".$f_extension_front;

        $target_dir_front = $target_dir."/".$f_newfile_front;
        $save_file_path_db_front = $save_file_path_db."/".$f_newfile_front;

        move_uploaded_file($f_tmp_front,$target_dir_front);

        // device back image upload
        $device_back_image = $_FILES['device_back_image']['name'];
        $f_tmp_back = $_FILES['device_back_image']['tmp_name'];

        $f_extension_back = explode('.', $device_back_image); //explode() convert string into array form.
        $f_extension_back = strtolower(end($f_extension_back)); // end() show the last index result of array.
        $f_newfile_back = rand().'_'.time().".".$f_extension_back;

        $target_dir_back = $target_dir."/".$f_newfile_back;
        $save_file_path_db_back = $save_file_path_db."/".$f_newfile_back;

        move_uploaded_file($f_tmp_back,$target_dir_back);

    if($_POST['warranty'] == "yes" && $_POST['accessories'] != "yes" && $_POST['ip'] == "yes"){

        // warranty image upload
        $warranty_image_name = $_FILES['warranty_image']['name'];
        $f_tmp_warranty = $_FILES['warranty_image']['tmp_name'];

        $f_extension_warranty = explode('.', $warranty_image_name); //explode() convert string into array form.
        $f_extension_warranty = strtolower(end($f_extension_warranty)); // end() show the last index result of array.
        $f_newfile_warranty = rand().'_'.time().".".$f_extension_warranty;

        $target_dir_warranty = $target_dir."/".$f_newfile_warranty;
        $save_file_path_db_warranty = $save_file_path_db."/".$f_newfile_warranty;

        move_uploaded_file($f_tmp_warranty,$target_dir_warranty);

        //ipsettings image upload
        $ip_settings_image_name = $_FILES['ip_settings_image']['name'];
        $f_tmp_ip  = $_FILES['ip_settings_image']['tmp_name'];

        $f_extension_ip = explode('.', $ip_settings_image_name); //explode() convert string into array form.
        $f_extension_ip = strtolower(end($f_extension_ip)); // end() show the last index result of array.
        $f_newfile_ip = rand().'_'.time().".".$f_extension_ip;

        $target_dir = $target_dir."/".$f_newfile_ip;
        $save_file_path_db_ip = $save_file_path_db."/".$f_newfile_ip;

        if(move_uploaded_file($f_tmp_ip,$target_dir))
        {
            $req->req_uid               = $_POST['uid'];
            $req->req_rid               = $_POST['rid'];
            $req->req_did               = $_POST['did'];
            $req->req_front_image       = $save_file_path_db_front;
            $req->req_back_image        = $save_file_path_db_back;
            $req->req_warranty          = $_POST['warranty'];
            $req->req_warranty_image    = $save_file_path_db_warranty;
            $req->req_backup            = $_POST['backup'];
            $req->req_ip                = $_POST['ip'];
            $req->req_ip_settings       = $_POST['ip_settings'];
            $req->req_ip_settings_image = $save_file_path_db_ip;
            $req->req_accessories       = $_POST['accessories'];
            // $req->req_accessories_detail    = $_POST['accessories_detail'];

            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time         = date('Y-m-d H:i:s');

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] == "yes" && $_POST['accessories'] == "yes" && $_POST['ip'] == "yes"){

        //accessories image upload
        $accessories_image_name = $_FILES['accessories_image']['name'];
        $f_tmp_accessories = $_FILES['accessories_image']['tmp_name'];

        $f_extension_accessories = explode('.', $accessories_image_name); //explode() convert string into array form.
        $f_extension_accessories = strtolower(end($f_extension_accessories)); // end() show the last index result of array.
        $f_newfile_accessories= rand().'_'.time().".".$f_extension_accessories;
        $target_dir_accessories = $target_dir."/".$f_newfile_accessories;
        $save_file_path_db_accessories = $save_file_path_db."/".$f_newfile_accessories;

        move_uploaded_file($f_tmp_accessories,$target_dir_accessories);

        // warranty image upload
        $warranty_image_name = $_FILES['warranty_image']['name'];
        $f_tmp_warranty = $_FILES['warranty_image']['tmp_name'];

        $f_extension_warranty = explode('.', $warranty_image_name); //explode() convert string into array form.
        $f_extension_warranty = strtolower(end($f_extension_warranty)); // end() show the last index result of array.
        $f_newfile_warranty = rand().'_'.time().".".$f_extension_warranty;

        $target_dir_warranty = $target_dir."/".$f_newfile_warranty;
        $save_file_path_db_warranty = $save_file_path_db."/".$f_newfile_warranty;

        move_uploaded_file($f_tmp_warranty,$target_dir_warranty);

        //ipsettings image upload
        $ip_settings_image_name = $_FILES['ip_settings_image']['name'];
        $f_tmp_ip  = $_FILES['ip_settings_image']['tmp_name'];

        $f_extension_ip = explode('.', $ip_settings_image_name); //explode() convert string into array form.
        $f_extension_ip = strtolower(end($f_extension_ip)); // end() show the last index result of array.
        $f_newfile_ip = rand().'_'.time().".".$f_extension_ip;

        $target_dir = $target_dir."/".$f_newfile_ip;
        $save_file_path_db_ip = $save_file_path_db."/".$f_newfile_ip;

        if(move_uploaded_file($f_tmp_ip,$target_dir))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_warranty_image        = $save_file_path_db_warranty;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_ip_settings           = $_POST['ip_settings'];
            $req->req_ip_settings_image     = $save_file_path_db_ip;
            $req->req_accessories           = $_POST['accessories'];
            $req->req_accessories_detail    = $_POST['accessories_detail'];
            $req->req_accessories_image     = $save_file_path_db_accessories;
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] != "yes" && $_POST['accessories'] != "yes" && $_POST['ip'] != "yes")
    {

            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_warranty              = $_POST['warranty'];
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_ip_settings           = $_POST['ip_settings'];
            $req->req_accessories           = $_POST['accessories'];
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
    }
    elseif($_POST['warranty'] == "yes" && $_POST['accessories'] == "yes" && $_POST['ip'] != "yes"){
        //accessories image upload
        $accessories_image_name = $_FILES['accessories_image']['name'];
        $f_tmp_accessories = $_FILES['accessories_image']['tmp_name'];

        $f_extension_accessories = explode('.', $accessories_image_name); //explode() convert string into array form.
        $f_extension_accessories = strtolower(end($f_extension_accessories)); // end() show the last index result of array.
        $f_newfile_accessories= rand().'_'.time().".".$f_extension_accessories;

        $target_dir_accessories = $target_dir."/".$f_newfile_accessories;
        $save_file_path_db_accessories = $save_file_path_db."/".$f_newfile_accessories;

        move_uploaded_file($f_tmp_accessories,$target_dir_accessories);

        // warranty image upload
        $warranty_image_name = $_FILES['warranty_image']['name'];
        $f_tmp_warranty = $_FILES['warranty_image']['tmp_name'];

        $f_extension_warranty = explode('.', $warranty_image_name); //explode() convert string into array form.
        $f_extension_warranty = strtolower(end($f_extension_warranty)); // end() show the last index result of array.
        $f_newfile_warranty = rand().'_'.time().".".$f_extension_warranty;

        $target_dir_warranty = $target_dir."/".$f_newfile_warranty;
        $save_file_path_db_warranty = $save_file_path_db."/".$f_newfile_warranty;

        if(move_uploaded_file($f_tmp_warranty,$target_dir_warranty))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_warranty_image        = $save_file_path_db_warranty;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_accessories           = $_POST['accessories'];
            $req->req_accessories_detail    = $_POST['accessories_detail'];
            $req->req_accessories_image     = $save_file_path_db_accessories;
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] != "yes" && $_POST['accessories'] == "yes" && $_POST['ip'] == "yes"){
        //accessories image upload
        $accessories_image_name = $_FILES['accessories_image']['name'];
        $f_tmp_accessories = $_FILES['accessories_image']['tmp_name'];

        $f_extension_accessories = explode('.', $accessories_image_name); //explode() convert string into array form.
        $f_extension_accessories = strtolower(end($f_extension_accessories)); // end() show the last index result of array.
        $f_newfile_accessories= rand().'_'.time().".".$f_extension_accessories;

        $target_dir_accessories = $target_dir."/".$f_newfile_accessories;
        $save_file_path_db_accessories = $save_file_path_db."/".$f_newfile_accessories;

        move_uploaded_file($f_tmp_accessories,$target_dir_accessories);

        //ipsettings image upload
        $ip_settings_image_name = $_FILES['ip_settings_image']['name'];
        $f_tmp_ip  = $_FILES['ip_settings_image']['tmp_name'];

        $f_extension_ip = explode('.', $ip_settings_image_name); //explode() convert string into array form.
        $f_extension_ip = strtolower(end($f_extension_ip)); // end() show the last index result of array.
        $f_newfile_ip = rand().'_'.time().".".$f_extension_ip;

        $target_dir = $target_dir."/".$f_newfile_ip;
        $save_file_path_db_ip = $save_file_path_db."/".$f_newfile_ip;

        if(move_uploaded_file($f_tmp_ip,$target_dir))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_ip_settings           = $_POST['ip_settings'];
            $req->req_ip_settings_image     = $save_file_path_db_ip;
            $req->req_accessories           = $_POST['accessories'];
            $req->req_accessories_detail    = $_POST['accessories_detail'];
            $req->req_accessories_image     = $save_file_path_db_accessories;
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] != "yes" && $_POST['accessories'] != "yes" && $_POST['ip'] == "yes"){
        
        //ipsettings image upload
        $ip_settings_image_name = $_FILES['ip_settings_image']['name'];
        $f_tmp_ip  = $_FILES['ip_settings_image']['tmp_name'];

        $f_extension_ip = explode('.', $ip_settings_image_name); //explode() convert string into array form.
        $f_extension_ip = strtolower(end($f_extension_ip)); // end() show the last index result of array.
        $f_newfile_ip = rand().'_'.time().".".$f_extension_ip;

        $target_dir = $target_dir."/".$f_newfile_ip;
        $save_file_path_db_ip = $save_file_path_db."/".$f_newfile_ip;

        if(move_uploaded_file($f_tmp_ip,$target_dir))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_ip_settings           = $_POST['ip_settings'];
            $req->req_ip_settings_image     = $save_file_path_db_ip;
            $req->req_accessories           = $_POST['accessories'];
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] == "yes" && $_POST['accessories'] != "yes" && $_POST['ip'] != "yes"){

        // warranty image upload
        $warranty_image_name = $_FILES['warranty_image']['name'];
        $f_tmp_warranty = $_FILES['warranty_image']['tmp_name'];

        $f_extension_warranty = explode('.', $warranty_image_name); //explode() convert string into array form.
        $f_extension_warranty = strtolower(end($f_extension_warranty)); // end() show the last index result of array.
        $f_newfile_warranty = rand().'_'.time().".".$f_extension_warranty;

        $target_dir_warranty = $target_dir."/".$f_newfile_warranty;
        $save_file_path_db_warranty = $save_file_path_db."/".$f_newfile_warranty;

        if(move_uploaded_file($f_tmp_warranty,$target_dir_warranty))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_warranty_image        = $save_file_path_db_warranty;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_accessories           = $_POST['accessories'];
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        }
    }
    elseif($_POST['warranty'] != "yes" && $_POST['accessories'] == "yes" && $_POST['ip'] != "yes"){
       //accessories image upload
        $accessories_image_name = $_FILES['accessories_image']['name'];
        $f_tmp_accessories = $_FILES['accessories_image']['tmp_name'];

        $f_extension_accessories = explode('.', $accessories_image_name); //explode() convert string into array form.
        $f_extension_accessories = strtolower(end($f_extension_accessories)); // end() show the last index result of array.
        $f_newfile_accessories= rand().'_'.time().".".$f_extension_accessories;

        $target_dir_accessories = $target_dir."/".$f_newfile_accessories;
        $save_file_path_db_accessories = $save_file_path_db."/".$f_newfile_accessories;

        if(move_uploaded_file($f_tmp_accessories,$target_dir_accessories))
        {
            $req->req_uid                   = $_POST['uid'];
            $req->req_rid                   = $_POST['rid'];
            $req->req_did                   = $_POST['did'];
            $req->req_warranty              = $_POST['warranty'];
            $req->req_front_image           = $save_file_path_db_front;
            $req->req_back_image            = $save_file_path_db_back;
            $req->req_backup                = $_POST['backup'];
            $req->req_ip                    = $_POST['ip'];
            $req->req_accessories           = $_POST['accessories'];
            $req->req_accessories_detail    = $_POST['accessories_detail'];
            $req->req_accessories_image     = $save_file_path_db_accessories;
            $req->req_receivedOrSent        = "notReceived";
            $req->req_device_status         = "diagnose";
            $req->req_request_time          = date('Y-m-d H:i:s');
            $req->req_damage_reason         = $_POST['damag_reason'];
            $req->req_device                = $_POST['device'];

        if(!empty($req->req_uid)){
                // create
                $check = $req->create();
                // print_r($check);exit();
                if($check){
                     header("location: ../manage_requests.php?message=true");
                }
                 else if($check=="exists"){
                    header("location: ../manage_requests.php?message=exists");
                 }
                // if unable to create
                else{
                    header("location: ../manage_requests.php?message=false");
                }
            }
        }
        else{
            echo json_encode([
                "Message"=>"Pleaser choose image!",
                "Status"=>"Error"
            ]); 
        } 
    }
    
?>