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
     
	$result = array('data' => array());

if(isset($_GET['token'])){
		$data = $emp->read_dropdown();

		foreach ($data as $key => $value) {

		$name = $value['first_name']. ' ' .$value['last_name'];
		$eid = $value['eid'];

			$result['data'][$key] = array(
				$eid,
				$name
			);
		} // /foreach

		echo json_encode($result);

	}
else{
		$data = $emp->read();
		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {

		$image = "<img src='".$value['image']."' height='100px' width='100px'>";
		$name = $value['first_name']. ' ' .$value['last_name'];
		$eid = "<td style='display:none'>".$value['eid']."</td>";
		$checkbox = "<input id='".$value['eid']."' type='checkbox' name='case' class='case' />";
		$buttons = '<div style="width:140px"><a style="margin-right:15px" class="btn blue pull-left count" type="button" href="edit_employee.php?eid='.$value['eid'].'" style="margin-right:10px" >Edit</a>
			   		<button id="'.$delete++.'" onclick="confirmDelete('.$value['eid'].')" class="delete btn red pull-left" type="button">Delete</button> </div>';

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$value['employee_id'],
				$name,
				$value['email'],
				$value['phone'],
				$image,
				$value['gender'],
				$value['address'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
?>