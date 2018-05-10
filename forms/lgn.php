<?php
require_once '../include/base.php';
require_once '../'.DIR_INCLUDE.'DB_Login.php';
$db = new DB_Login();
session_start();
// json response array
$response = array("error" => FALSE);
if ((isset($_POST['email']) && isset($_POST['password'])) || (isset($_COOKIE['admin-email']) && isset($_COOKIE['admin-password']))) {
    //get cookies if set 
    if(isset($_COOKIE['admin-email']) && isset($_COOKIE['admin-password']))
    {
    	$email = $_COOKIE['admin-email'];
        $password = $_COOKIE['admin-password'];		
    }
    else // get from form
    {
        $email = $_POST['email'];
        $password = $_POST['password'];	
    }

    // get the admin by email and password
    $admin = $db->getadminByEmailAndPassword($email, $password);

    if ($admin != false) {
        // use is found
        $response["error"] = FALSE;
		$response["adminId"] = $admin["adminId"];
        $response["admin"]["fullname"] = $admin["fullname"];
        $response["admin"]["email"] = $admin["email"];
        $_SESSION['adminId']=$response["adminId"];
        $_SESSION['fullname']=$response["admin"]["fullname"];
        if(isset($_POST['remember']))
        {
        	$cookie_email = $_POST['email'];
        	$cookie_password = $_POST['password'];
        	setcookie("admin-email", $cookie_email, time() + (86400 * 30), "/");
        	setcookie("admin-password", $cookie_password, time() + (86400 * 30), "/");
        }

        header("location:".DIR_ROOT.DIR_VIEW."dashboard.php");
    } else {
        // admin is not found with the credentials
        $response["error"] = TRUE;
		header("location:".DIR_ROOT."index.php?err=4");
    }	
} else {
    // required post params is missing
    $response["error"] = TRUE;
	header("location:".DIR_ROOT."index.php?err=5");
}
?>