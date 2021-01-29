<?php
// msguired headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/message.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();

      // initialize object
    $msg = new Message($db);

	$result = array('data' => array());

	$data = $msg->read();

		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {
		
		$recording = "	<audio controls>
						  <source src='".$value['recording']."' type='audio/ogg'>
						  <source src='".$value['recording']."' type='audio/mpeg'>
						Your browser does not support the audio element.
					</audio>";
		$name = $value['first_name']. ' ' .$value['last_name'];
		$image	= "<img src='".$value['image']."' height='100px' width='100px'>";
		$mid = "<td style='display:none'>".$value['mid']."</td>";
		$checkbox = "<input id='".$value['mid']."' type='checkbox' name='case' class='case' />";
		$buttons = '<div style="width:100%">
			   			<button id="'.$delete++.'" onclick="confirmDelete('.$value['mid'].')" class="delete btn red pull-left" type="button">Delete
			   			</button>
			   		</div>';

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$name,
				$value['message'],
				$image,
				$recording,
				$buttons
			);
		} // /foreach

		echo json_encode($result);

?>