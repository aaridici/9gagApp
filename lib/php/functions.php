<?php
function connect(){
	$link = mysql_connect('***', '***', '****'); 
	if (!$link) { 
		die('Could not connect: ' . mysql_error()); 
	}
	mysql_select_db('9gag');
	return $link;
}
function disconnect(){
	mysql_close();
}
function pconnect(){
	$link = mysql_pconnect('***', '***', '****'); 
	if (!$link) { 
		die('Could not connect: ' . mysql_error()); 
	}
	mysql_select_db('9gag');
	return $link;
}
function dbQuery($queryStr){
	mysql_query($queryStr) or die("MySQL Error:".mysql_error());
}
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
?> 