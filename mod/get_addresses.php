<?php if(!defined('SECURITY')) exit('404 - Not Access');
	//lấy địa chỉ theo google
	$ar='';
	if(isset($_POST['address'])){
		if(is_array($_POST['address'])){
			$address= $_POST['address'][0].$config['address_search_google'];
		}
		else {
			$address= $_POST['address'].$config['address_search_google'];
		}

		$json = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key='.API_KEY.'&sensor=false&language=de&address='.urlencode($address)));
		
		if(!empty($json->results)){
			$i=0;
			foreach($json->results as $value){
				$ar[]=$value->formatted_address;
				$i++;
				if($i==5) break;
			}
		}
	}
	
	echo json_encode($ar);
	
	
?>