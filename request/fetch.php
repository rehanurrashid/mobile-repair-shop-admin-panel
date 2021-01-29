<?php
// required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
     
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/request.php';
     
    // instantiate database and object
    $database = new Database();
    $db = $database->getConnection();

      // initialize object
    $req = new Request($db);

	$result = array('data' => array());

	$data = $req->read();

		// echo '<pre>',print_r($data),'</pre>';
		// exit();
		$serial = 1;
		$delete =0;
		foreach ($data as $key => $value) {

		$device_front_image	= "<img src='".$value['device_front_image']."' height='100px' width='100px'>";
		$device_back_image	= "<img src='".$value['device_back_image']."' height='100px' width='100px'>";
		$warranty_image		= "<img src='".$value['warranty_image']."' height='100px' width='100px'>";
		$ip_settings_image	= "<img src='".$value['ip_settings_image']."' height='100px' width='100px'>";
		$accessories_image	= "<img src='".$value['accessories_image']."' height='100px' width='100px'>";
		$name = $value['first_name']. ' ' .$value['last_name'];
		$receivedorsent =  "<h5 class='text-center'>".$value['receivedorsent']."</h5>
							<br> <br>
							<a  class='btn green pull-left devicereceivedstatus' style='cursor: pointer;' data-toggle='modal' data-target='#modal_device_received_sent' id='".$value['id']."'>
							Change Status
							</a>
							";
		$device_status =  "<h5 class='text-center'>".$value['device_status']."</h5>
							<br><br>
							<a  class='btn blue pull-left devicereceivedstatus' style='cursor: pointer;' data-toggle='modal' data-target='#modal_device_diagnose_repair' id='".$value['id']."'>
							Change Status
							</a>
							";
		$id = "<td style='display:none'>".$value['id']."</td>";
		$checkbox = "<input id='".$value['id']."' type='checkbox' name='case' class='case' />";
		$buttons = '<div style="width:140px">
						<a style="margin-right:15px" class="btn blue pull-left count" type="button" href="edit_request.php?id='.$value['id'].'" >Edit
						</a>
			   			<button id="'.$delete++.'" onclick="confirmDelete('.$value['id'].')" class="delete btn red pull-left" type="button">Delete
			   			</button> <br><br><br>
			   			<a style="width:100%" class="btn green pull-left count" type="button" href="view_request.php?id='.$value['id'].'" >View & Print
			   			</a>
			   		</div>';
			  if(!empty($value['rid'])){
			  	$damage_reason = $value['reason'];
			  }
			  else{
			  	$damage_reason = $value['damage_reason'];
			  }
			  if(!empty($value['did'])){
			  	$device_name = $value['device_name'];
			  }
			  else{
			  	$device_name = $value['device'];
			  }

			$result['data'][$key] = array(
				$checkbox,
				$serial++,
				$name,
				$device_name,
				$damage_reason,
				$device_front_image,
				$device_back_image,
				$value['warranty'],
				$warranty_image,
				$value['import_data'],
				$value['ip'],
				$value['ip_settings'],
				$ip_settings_image,
				$value['accessories'],
				$value['accessories_details'],
				$accessories_image,
				$receivedorsent,
				$device_status,
				$value['device_receive_time'],
				$value['device_sent_time'],
				$value['repair_price'],
				$value['repair_time'],
				$value['request_time'],
				$value['user_approval'],
				$buttons
			);
		} // /foreach

		echo json_encode($result);

?>