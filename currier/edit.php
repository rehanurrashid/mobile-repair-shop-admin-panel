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


    // $content = file_get_contents("php://input");
    // $decoded = json_decode($content, true);

    // code for image 
    $save_file_path_db = "upload/images";
    $target_dir="../upload/images";
        if(!file_exists($target_dir)){
            mkdir($target_dir,0777,true);
        }
    $f_name = $_FILES['currier_image']['name'];
    $f_tmp  = $_FILES['currier_image']['tmp_name'];

    $f_extension = explode('.', $f_name); //explode() convert string into array form.
    $f_extension = strtolower(end($f_extension)); // end() show the last index result of array.
    $f_newfile = rand().'_'.time().".".$f_extension;

    $target_dir = $target_dir."/".$f_newfile;

    $save_file_path_db = $save_file_path_db."/".$f_newfile;
    if(move_uploaded_file($f_tmp,$target_dir))
    {   
        $currier->cid           = $_POST['cid'];
        $currier->currier_id        = $_POST['currier_id'];
        $currier->currier_fname     = $_POST['currier_fname'];
        $currier->currier_lname     = $_POST['currier_lname'];
        $currier->currier_email     = $_POST['currier_email'];
        $currier->currier_phone     = $_POST['currier_phone'];
        $currier->currier_image     = $save_file_path_db;
        $currier->currier_gender    = $_POST['currier_gender'];
        $currier->currier_address   = $_POST['currier_address'];

    if(!empty($currier->currier_id)){
            // create
            $check = $currier->update();
            if($check){
                 header("location: ../manage_currier.php?message=editsucessfully");
            }
            // if unable to create
            else{
                header("location: ../manage_currier.php?message=editunsucessfull");
            }
        }
    }
    else{
        echo json_encode([
            "Message"=>"BadHappened",
            "Status"=>"Error"
        ]); 
    }

    


?>