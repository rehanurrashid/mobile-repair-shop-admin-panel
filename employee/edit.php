<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/employee.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();
     
    // initialize object
    $emp = new Employee($db);


    // $content = file_get_contents("php://input");
    // $decoded = json_decode($content, true);

    // code for image 
    $save_file_path_db = "upload/images";
    $target_dir="../upload/images";
        if(!file_exists($target_dir)){
            mkdir($target_dir,0777,true);
        }
    $f_name = $_FILES['emp_image']['name'];
    $f_tmp  = $_FILES['emp_image']['tmp_name'];

    $f_extension = explode('.', $f_name); //explode() convert string into array form.
    $f_extension = strtolower(end($f_extension)); // end() show the last index result of array.
    $f_newfile = rand().'_'.time().".".$f_extension;

    $target_dir = $target_dir."/".$f_newfile;

    $save_file_path_db = $save_file_path_db."/".$f_newfile;
    if(move_uploaded_file($f_tmp,$target_dir))
    {   
        $emp->eid           = $_POST['eid'];
        $emp->emp_id        = $_POST['emp_id'];
        $emp->emp_fname     = $_POST['emp_fname'];
        $emp->emp_lname     = $_POST['emp_lname'];
        $emp->emp_email     = $_POST['emp_email'];
        $emp->emp_phone     = $_POST['emp_phone'];
        $emp->emp_image     = $save_file_path_db;
        $emp->emp_gender    = $_POST['emp_gender'];
        $emp->emp_address   = $_POST['emp_address'];

    if(!empty($emp->emp_id)){
            // create
            $check = $emp->update();
            if($check){
                 header("location: ../manage_employees.php?message=editsucessfully");
            }
            // if unable to create
            else{
                header("location: ../manage_employees.php?message=editunsucessfull");
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