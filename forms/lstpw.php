<?php
require_once '../include/base.php';
require_once '../'.DIR_INCLUDE.'DB_Login.php';
$db = new DB_Login();
// json response array
$response = array("error" => FALSE);

if (isset($_POST["lstpwemail"])) {
	$email=$_POST["lstpwemail"];
	
	// check if admin email is valid
    if ($db->isadminExisted($email)) {
        // admin exists
        $response["error"] = FALSE;
		$passrec=$db->activatePassRec($email);//Update activation code
// send verification message
$variables = array();
$variables['email'] = $email;
$variables['activation_code'] = $passrec['activation_code'];
$variables['activation_salt'] = $passrec['activation_salt'];

$to = $email;
$subject = "Password Recovery";
$Content = file_get_contents("password-recovery.php");
foreach($variables as $key => $value)
{
    $Content = str_replace('{{ '.$key.' }}', $value, $Content);
}            
		$headers = "From: adsgrag.com"."\r\n";
		$headers .= "MIME-Version: 1.0\n" ;
        $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"\n";
        $headers .= "X-Priority: 1 (Highest)\n";
        $headers .= "X-MSMail-Priority: High\n";
        $headers .= "Importance: High\n";
mail($to,$subject,$Content,$headers);
// end of mail
header("Location:".DIR_ROOT."index.php?reg=2");
    }else {
        // create a new user
		header("Location:".DIR_ROOT."index.php?err=4");
		  }
} else {
    $response["error"] = TRUE;
    //echo json_encode($response);
    header("Location:".DIR_ROOT."index.php?err=3");
}
?>