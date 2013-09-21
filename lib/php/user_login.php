<?php
function login(){
	if(isset($_POST)){
		if(isset($_POST["username"])&&isset($_POST["password"])){
			if(!isConnected()){
				connect();
			}
			$_username = mysql_real_escape_string($_POST["username"]);
			$_password = mysql_real_escape_string($_POST["password"]);
			
			$query = "SELECT * FROM users WHERE username='".$_username."'";
			$result = dbQuery($query);
			if(mysql_num_rows($result) > 0) { 
				$row = mysql_fetch_array($result);
				if(md5($_password)==$row["password"]){
					if(canLogin($_username)){
						setcookie("username",$_username, time()+3600*24*90);
						setcookie("password",$row["password"], time()+3600*24*90);
						createUser($_username);
						return "success";
					}else{
						return "perm_error";
					}
				}else{
					return "error";
				}
			}else{
				return "error";
			}
		}else{
			return "no_response";
		}
	}else{
		return "no_response";
	}
}