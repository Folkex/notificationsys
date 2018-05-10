<?php
require_once '../include/base.php';
require_once '../'.DIR_INCLUDE.'DB_Login.php';
$db = new DB_Login();
// json response array
$response = array("error" => FALSE);

if (isset($_POST['semail'])  &&  isset($_POST['spassword']) && isset($_POST['sfullname']) && isset($_POST['sphone']) && isset($_POST['scompany_name']) /*&& isset($_POST['traffic'])*/ && isset($_POST['swebsite']) && isset($_POST['country_code'])) {
    // receiving the post params
    $email = $_POST['semail'];
	$password = $_POST['spassword'];
	$fullname = $_POST['sfullname'];
	$phone=$_POST['country_code'].$_POST['sphone'];
	$company_name=$_POST['scompany_name'];
	/*$traffic=$_POST['traffic'];*/
	$traffic=0;
	$website=$_POST['swebsite'];
    // check if admin is already existed with the same adminemail
    if ($adminex=$db->isadminExisted($email)) {
        // admin already existed
        $response["error"] = TRUE;
        header("Location:".DIR_ROOT."index.php?err=1");
    } else {
        // create a new admin
        $admin = $db->insertadmin($email, $password, $fullname, $phone, $company_name, $traffic, $website);
         if ($admin) {
            // admin stored successfully
            $response["error"] = FALSE;
            $response["adminId"] = $admin["adminId"];
            $response["admin"]["fullname"] = $admin["fullname"];
            $response["admin"]["email"] = $admin["email"];
            $response["admin"]["date_created"] = $admin["date_created"];
$variables = array();
$variables['fullname'] = $admin["fullname"];
$variables['email'] = $admin["email"];
$variables['activation_code'] = $admin["activation_code"];
$variables['activation_salt'] = $admin["activation_salt"];
// send verification message
$to = $admin["email"] ;
$subject = "Signup | Verification";
$Content = file_get_contents("email-signup-activation.php");
foreach($variables as $key => $value)
{
    $Content = str_replace('{{ '.$key.' }}', $value, $Content);
} 
        $headers = "Reply-To: Web-Notify TEAM <info@adsgrag.com>\r\n";
        $headers .= "Return-Path: Web-Notify TEAM <info@adsgrag.com>\r\n";
        $headers .= "From: Web-Notify TEAM <info@adsgrag.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
        $headers .= "X-Priority: 3\r\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";
mail($to,$subject,$Content,$headers);
// end of mail
header("Location:".DIR_ROOT."index.php?reg=1");
		 } else {
            // admin failed to store
            $response["error"] = TRUE;
            header("Location:".DIR_ROOT."index.php?err=3");
        } 
		}
} else {
    $response["error"] = TRUE;
    //echo json_encode($response);
    header("Location:".DIR_ROOT."index.php?err=2");
}
?>