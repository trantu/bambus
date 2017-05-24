<?php if(!defined('SECURITY')) exit('404 - Not Access');
	// lấy địa chỉ theo google
	// $ar='';
	if(isset($_POST['address'])){
		if(is_array($_POST['address'])){
			$address= $_POST['address'][0].$config['address_search_google'];
		}
		else {
			$address= $_POST['address'].$config['address_search_google'];
		}

		//$address='he';
		$json = json_decode(file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?key='.API_KEY.'&sensor=false&language=de&address='.urlencode($address)));
		// echo "<pre>";
		// print_r($json->results);
		// echo "</pre>";
		$stress_notlogin = array();
		if(!empty($json->results)){
			foreach($json->results as $value)
			{
				if(isset($value->address_components))
				{
					$arr=$value->address_components;
					foreach ($arr as  $value) 
					{
						if( in_array('route',$value->types) )
						{
							if(in_array($value->long_name, $stress_notlogin)==false)
							{
								$stress_notlogin[]= $value->long_name;
							}
						}
					}
				}
			}
		}
	}

	echo json_encode($stress_notlogin);
	
?>