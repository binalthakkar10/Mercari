<?php 
class Banner {

public  function getUserIP(){

    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP)){
        $ip = $client;
    }elseif(filter_var($forward, FILTER_VALIDATE_IP)){
        $ip = $forward;
    }else{
        $ip = $remote;
    }
		
    return $ip;
}
 public  function getDateAvailability(){

 	 $startDate = strtotime('2014-08-10T12:00:00+0900');
	 $endDate =  strtotime('2014-08-10T12:00:00+0902');
	 $currentDate = strtotime(date("Y-m-d H:i:s"));

	 if($startDate == $currentDate){
	     $getSeconds = ($endDate - $startDate)*1000;
	 }else{
	 	$getSeconds = 0;
	 }
	 return $getSeconds;
 }

 public function displayImage(){
 				$user_ip = self::getUserIP();// Get Client's IP Address
				 $timeAvailability =  self::getDateAvailability(); // CHange Start & EndDate

 				$allowedIpAdd1 = '10.0.0.1';
				$allowedIpAdd2 = '10.0.0.2';

				if($user_ip == $allowedIpAdd1 || $user_ip == $allowedIpAdd2 ){
						$data['image'] =  '<img src="images/banner.jpg" class="img">';
					}else if($timeAvailability!=0){
						$data['image'] = '<img src="images/banner.jpg" id="thisImg" class="img">';
						$data['timeAvailability'] = $timeAvailability;
					}else{
						$data['image'] = '<h3>oops data not available for your IP Address</h3>';
					}
	return 	$data;		
 }


}

?>