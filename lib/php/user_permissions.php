<?php
function canLogin($username){
	$result = dbQuery("SELECT * FROM users WHERE username='".mysql_real_escape_string($username)."'");
	$row = mysql_fetch_array($result);
	$result = dbQuery("SELECT * FROM users_permissions WHERE id='".$row["id"]."'");
	$row = mysql_fetch_array($result);
	if($row["login"]==1||$row["login"]=="1"){
		return true;
	}else{
		return false;
	}
}
function hasPermission($action){
	if(isLoggedIn()){
		$result = dbQuery("SELECT * FROM users WHERE username='".mysql_real_escape_string($_COOKIE["username"])."'");
		$row = mysql_fetch_array($result);
		if($row["role"]=="superadmin"){
			return true;
		}else{
			$result = dbQuery("SELECT * FROM users_permissions WHERE id='".$row["id"]."'");
			$row = mysql_fetch_array($result);
			if(isset($row[$action])){
				if($row[$action]==1||$row[$action]=="1"){
					return true;
				}else{
					return false;
				}
			}else{
				return false;
			}
		}
	}else{
		return false;
	}
}
function getAllPermissions($_username){
	if(!isConnected()){
		connect();
	}
	$output = array();
	$result = dbQuery("SELECT * FROM users WHERE username='".$_username."'");
	$row = mysql_fetch_array($result);
	foreach($row as $key => $value){
		if(!is_numeric($key)){
			$output[$key] = $value;
		}
	}
	return $output;
}