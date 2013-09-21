<?php
function getUserInfo(){
	//$userInfo = get_browser(null, true);
	$platform = "";
	$browser = "";
	$ip = "";
	/*
	if(isset($userInfo)){
		$platform = $userInfo["platform"];
		$browser = $userInfo["browser"];
	}*/
	if(isset($_SERVER)){
		$ip = $_SERVER["REMOTE_ADDR"];
		$browser = $_SERVER["HTTP_USER_AGENT"];
	}
	$link = connect();
	$insertQuery = "INSERT INTO visitors (platform, browser, ip) VALUES ('$platform', '$browser', '$ip')";
	dbQuery($insertQuery);
	disconnect($link);
}