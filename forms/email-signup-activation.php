<?php
require_once '../include/base.php';
require_once '../'.DIR_INCLUDE.'DB_Login.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Adsgrag Email Confirmation</title>
    <!-- Meta -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Email verification ">
	<meta name="author" content="Adsgrag.com">
	<!-- Favicon icon -->
	<link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
	<link rel="icon" href="assets/images/favicon.ico" type="image/x-icon">
</head>
<body>
 <div class="loader-bg">
    <div class="loader-bar">
    </div>
  </div>
<div style="background:#f2f2f2;margin:0 auto;max-width:640px;padding:0 20px">
	<table align="center" border="0" cellpadding="0" cellspacing="0">
		<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>
		<tr>
			<td>
				<div style="text-align: center;background-color: #2196F3;color: #Fff;font-family:'Open Sans', sans-serif;font-size:13px; padding: 1px;margin-top: 10px;border-radius:10px 10px 0 0;">
					<h2>Email Verification</h2>
				</div>
				<div style="background:#fff;color:#5b5b5b;font-family:'Open Sans', sans-serif;font-size:13px;padding:10px 20px;margin:20px auto;line-height:17px;border:1px #ddd solid;border-top:0;clear:both;margin-top: 0;border-radius: 0 0 10px 10px;">
					<p>Greetings from adsgrag.com</p>
					<p>Dear {{ username }},</p>
					<p>Thanks for signing up!</p>
					<p>Your account has been created, you can login with the following credentials after you have activated your account by pressing the Activate button below.</p>


					<div style="text-align:center;margin:15px"> <a href="https://www.adsgrag.com/Beta1.0/adsgrag1.0/forms/user/verify.php?email={{ email }}&activation_code={{ activation_code }}&salt={{ activation_salt }}" style="display:inline-block; padding: 10px;background-color: #1b8bf9;font-size: 15px;color: #fff;border-radius: 5px;text-decoration:none;">Activate</a> </div>

				</div>
				<table border="0" cellpadding="0" cellspacing="0" width="100%">
					<tbody>
                    <tr>
						<td height="35">&nbsp;</td>
					</tr>
					<tr>
						<td>
							<table border="0" cellpadding="0" cellspacing="0" width="100%">
								<tbody>
								<tr>
									<td style="font-family:'Open Sans',Arial,sans-serif;font-size:12px;padding-bottom: 10px;text-align: center;"> if you have any issue, feel free to contact us at <a href="mailto:info@adsgrag.com" style="color:#000;font-weight:bold;text-decoration:none" target="_blank"> info@adsgrag.com </a> .
									</td>
								</tr>
								</tbody>
							</table>
						</td>
					</tr>
					</tbody>
				</table></td>
		</tr>
		</tbody>
	</table>
</div>
</body>
</html>