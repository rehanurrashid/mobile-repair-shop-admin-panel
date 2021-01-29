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
     
    if(isset($_GET['eid'])){
        $eid =$_GET['eid'];
        $stmt = $emp->readOne($eid);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // emp array
            $emp_arr=array();
            $emp_arr["records"]=array();
            
            $eid = 0;
            $employee_id =0;
            $first_name="";
            $last_name="";
            $email="";
            $phone="";
            $image="";
            $gender="";
            $address="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $emp_item=array(
                    "eid"   => $eid,
                    "emp_id" => $employee_id,
                    "emp_fname" => $first_name,
                    "emp_lname" => $last_name,
                    "emp_email" => $email,
                    "emp_phone" => $phone,
                    "emp_image" => $image,
                    "emp_gender" => $gender,
                    "emp_address" => $address
                );
         
                array_push($emp_arr["records"], $emp_item);
            }
         
            echo json_encode($emp_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No employees found.")
            );
        }
    }
    else{
        
        $stmt = $emp->read();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // emp array
            $emp_arr=array();
            $emp_arr["records"]=array();
            
            $eid = 0;
            $employee_id =0;
            $first_name="";
            $last_name="";
            $email="";
            $phone="";
            $image="";
            $gender="";
            $address="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $emp_item=array(
                    "eid"   => $eid,
                    "emp_id" => $employee_id,
                    "emp_fname" => $first_name,
                    "emp_lname" => $last_name,
                    "emp_email" => $email,
                    "emp_phone" => $phone,
                    "emp_image" => $image,
                    "emp_gender" => $gender,
                    "emp_address" => $address
                );
         
                array_push($emp_arr["records"], $emp_item);
            }
         
            echo json_encode($emp_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No employeess found.")
            );
        }
    }

?>