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
     
    if(isset($_GET['cid'])){
        $cid =$_GET['cid'];
        $stmt = $currier->readOne($cid);
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // currier array
            $currier_arr=array();
            $currier_arr["records"]=array();
            
            $cid = 0;
            $currier_id =0;
            $first_name="";
            $last_name="";
            $email="";
            $phone="";
            $image="";
            $gender="";
            $address="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $currier_item=array(
                    "cid"   => $cid,
                    "currier_id" => $currier_id,
                    "currier_fname" => $first_name,
                    "currier_lname" => $last_name,
                    "currier_email" => $email,
                    "currier_phone" => $phone,
                    "currier_image" => $image,
                    "currier_gender" => $gender,
                    "currier_address" => $address
                );
         
                array_push($currier_arr["records"], $currier_item);
            }
         
            echo json_encode($currier_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Curriers found.")
            );
        }
    }
    else{
        
        $stmt = $currier->read();
        $num = $stmt->rowCount();
        
        // check if more than 0 record found
        if($num>0){
            
            // currier array
            $currier_arr=array();
            $currier_arr["records"]=array();
            
            $cid = 0;
            $currier_id =0;
            $first_name="";
            $last_name="";
            $email="";
            $phone="";
            $image="";
            $gender="";
            $address="";
            
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                extract($row);
         
                $currier_item=array(
                    "cid"   => $cid,
                    "currier_id" => $currier_id,
                    "currier_fname" => $first_name,
                    "currier_lname" => $last_name,
                    "currier_email" => $email,
                    "currier_phone" => $phone,
                    "currier_image" => $image,
                    "currier_gender" => $gender,
                    "currier_address" => $address
                );
         
                array_push($currier_arr["records"], $currier_item);
            }
         
            echo json_encode($currier_arr);
        }
         
        else{
            echo json_encode(
                array("message" => "No Currierss found.")
            );
        }
    }

?>