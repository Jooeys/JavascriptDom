<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Forgot Password - Email verification

*/

session_start();

$db = mysqli_connect("localhost","root","","crud");// or die('unable to connect');
	
	//Forgot Password - verifying if email id already exists.
		
if(isset($_POST['frgt_btn']))
{
	$email = $_POST['email'];
	$validate_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
	//check if email id already exists in DB
			if($validate_mail)
			{
				$sql = "SELECT * FROM users WHERE email='$email'";
				$query_run = mysqli_query($db,$sql);
				$query_check = mysqli_num_rows($query_run);
				if($query_check == 1)
				{
					$_SESSION['email'] = $email;
					//$_SESSION['Success'] = "choose your password";
					header("location:Forgot_Password_2.php");
				}
				else
				{
					echo '<script type = "text/javascript"> alert("Email ID does not exist. Please register first.") </script>';
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("Email ID is invalid. Please enter a valid email ID. ") </script>';
			}			
}	

	
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Create New Password - Bigtree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login_styles_si.css">
</head>

<body>
    <div class="header">DIMOISEP IOT Management System</div>
    <div class="content">
    <div class="bg-image"></div>
    <img src="imgs/final.JPG" alt="Bigtree_logo">

    <div class="login">
        <h2>Email Verification</h2>
        <form action="Forgot_Password.php" method="POST"> 
            <div class="login-parameters">
                <div class="input-field">
                    <!-- <label for="name"><b>Email</b></label><br /> -->
					<p>Enter your Email ID</p>
					<input type="text" placeholder="Email" name="email" required>
                </div>
              
            </div>
            <button class="signInBtn" type="submit" name="frgt_btn">Confirm</button>
			
			<div style="margin-top: 20px;"> Login In? <button class="clickBtn" style="width:auto;" id="signupBtn"><a href="index.php">Click here</a></button>
                <!-- <button id="signupBtn" type="submit">Sign Up</button> -->
            </div>
           
        </form>
    </div>
</div>
<div class="footer">
    <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h5>
</div>
</body>

</html>