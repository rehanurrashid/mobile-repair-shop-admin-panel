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
     
	$result = array('data' => array());

	if(isset($_GET['token'])){
		$data = $currier->read_dropdown();

		foreach ($data as $key => $value) {

		$name = $value['first_name']. ' ' .$value['last_name'];
		$cid = $value['cid'];

			$result['data'][$key] = array(
				$cid,
				$name
			);
		} // /foreach

		echo json_encode($result);

	}
	else
	{
		$data = $currier->read();
		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {

		$image = "<img src='".$value['image']."' height='100px' width='100px'>";
		$name = $value['first_name']. ' ' .$value['last_name'];
		$cid = "<td style='display:none'>".$value['cid']."</td>";
		$checkbox = "<input id='".$value['cid']."' type='checkbox' name='case' class='case' />";
		$buttons = '<div style="width:140px"><a style="margin-right:15px" class="btn blue pull-left count" type="button" href="edit_currier.php?cid='.$value['cid'].'" >Edit</a>
			   		<button id="'.$delete++.'" onclick="confirmDelete('.$value['cid'].')" class="delete btn red pull-left" type="button">Delete</button></div>';

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$value['currier_id'],
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