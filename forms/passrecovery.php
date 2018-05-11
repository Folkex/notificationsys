<?php
require_once '../include/base.php';
require_once '../'.DIR_INCLUDE.'DB_Login.php';
$email=$_GET["email"];
$activation_code=$_GET["activation_code"];
$activation_salt=$_GET["salt"];
$db = new DB_Login();
if(isset($_POST["cgpassword"]) && isset($_POST["ccgpassword"])){
    echo "111";
	$password=$_POST["cgpassword"];
	if($db->changePass($email, $password, $activation_code,$activation_salt)){
		//header("Location:".DIR_ROOT."index.php?reg=3");
	}else{
		//header("Location:chngpwd.php?err=1");	
	}
}
?>