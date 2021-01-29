<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/device.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();

      // initialize object
    $device = new Device($db);
     
	$result = array('data' => array());

	if(isset($_GET['token']))
	{
		$data = $device->read_dropdown();

		foreach ($data as $key => $value) {
		
		$did = $value['did'];

			$result['data'][$key] = array(
				$value['did'],
				$value['name']
			);
		} // /foreach

		echo json_encode($result);
	}
	else
	{
		$data = $device->read();
		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {
		
		$did = "<td style='display:none'>".$value['did']."</td>";
		$checkbox = "<input id='".$value['did']."' type='checkbox' name='case' class='case' />";
		$buttons = '<a style="margin-right:15px" class="btn blue pull-left count" type="button" href="edit_device.php?did='.$value['did'].'" >Edit</a>
			   		<button id="'.$delete++.'" onclick="confirmDelete('.$value['did'].')" class="delete btn red pull-left" type="button">Delete</button>';

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$value['name'],
				$value['model'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);
	}
?>