<?php
function createUser($username){
	$_SESSION["user"] = array("permissions" => array());
	$_SESSION["user"]["permissions"] = getAllPermissions($username);
}
function isLoggedIn(){
	if(isset($_COOKIE)){
		if(isset($_COOKIE["username"])&&isset($_COOKIE["password"])){
			return true;
		}else{
			return false;
		}
	}else{
		return false;
	}
}