<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/reason.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();

      // initialize object
    $reason = new Reason($db);
     
	$result = array('data' => array());

	if(isset($_GET['token']))
	{
		$data = $reason->read_dropdown();

		foreach ($data as $key => $value) {
		
		$rid = $value['rid'];

			$result['data'][$key] = array(
				$rid,
				$value['reason'],
			);
		} // /foreach

		echo json_encode($result);
	}
	else
	{
		$data = $reason->read();
		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {
		
		// $rid = "<td style='display:none'>".$value['rid']."</td>";
		$checkbox = "<input id='".$value['rid']."' type='checkbox' name='case' class='case' />";
		$buttons = '<div style="width:140px"><a style="margin-right:15px" class="btn blue pull-left count" type="button" href="edit_reason.php?rid='.$value['rid'].'" >Edit</a>
			   		<button id="'.$delete++.'" onclick="confirmDelete('.$value['rid'].')" class="delete btn red pull-left" type="button">Delete</button> </div>';

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$value['reason'],
				$value['description'],
				$buttons
			);
		} // /foreach

	echo json_encode($result);
	}
	
?>