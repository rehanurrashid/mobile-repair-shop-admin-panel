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
    
    if(isset($_GET['token'])){

        $emp_id = $_GET['eid'];

         // delete
        $check = $emp->delete($emp_id);
        if($check){
            header("location: ../manage_employees.php?message=deletesuccessfully");
        }
         
        // if unable to delete
        else{
            header("location: ../manage_employees.php?message=notdeleted");
        } 
    }
    else
    {   
        $emp_id = $_GET['eid'];
        $check = $emp->deleteAll($emp_id);

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