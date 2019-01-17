<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
* name: Forgot Password - Updating password 

*/

session_start();

//require('Forgot_Password.php');

$db = mysqli_connect("localhost","root","","crud");// or die('unable to connect');

//Fucntion to check strength of password
	function check_password($password)
	{
		$response = "OK";	
		$uppercase = preg_match('`[A-Z]`',$password);  // at least one upper case
		$lowercase = preg_match('`[a-z]`',$password); // at least one lower case 
		$numbers = preg_match('`[0-9]`',$password); // at least one digit
		$special_Char = preg_match('/[^a-zA-Z\d]/', $password); //atleast one special char
		if(strlen($password)<7)
		{
			$response = '<script type = "text/javascript"> alert("Password must be at least 7 characters") </script>';
		}
		else if(!$uppercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have 1 capital letter") </script>';
		}
		else if(!$lowercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have 1 lower case letter") </script>';
		}
		else if(!$numbers)
		{
			$response = '<script type = "text/javascript"> alert("Password must have least 1 number") </script>';
		}
		else if(!$special_Char)
		{
			$response = '<script type = "text/javascript"> alert("Password must have least 1 special character") </script>';
		}
		return $response;
	}

	
	//Forgot Password
		
if(isset($_POST['frgt_btn']))
{
	//fetching data from HTML code
	$email = $_POST['email'];
	$password = $_POST['pswd'];
	$conf_new_password = $_POST['conpswd'];
	
		$response = check_password($password);
		if($response == "OK")
		{
			if ($password == $conf_new_password) 
			{
				$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);
			
				//echo '<script type = "text/javascript"> alert("Email id already registered try another Email id ") </script>';
					$sql = "UPDATE users SET password='$hash_password' WHERE email='$email'";
					mysqli_query($db,$sql);
					//echo '<script type = "text/javascript"> alert("Password has been updated. Please login with updated credentials.") </script>';
					header("location: index.php");
			}
			else
			{
				echo '<script type = "text/javascript"> alert("New Password and confirm new password does not match ") </script>';
			}	
		}
		else	
		{
			echo $response;
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
    <style>
    </style>
    <script type="text/javascript">
		
    </script>
</head>

<body>

    <div class="bg-image"></div>
    <!-- <div class="header">
            <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"><h1> BIGTREE</h1>
        </div> -->

    <img src="imgs/final.JPG" alt="Bigtree_logo">


    <div class="login">
        <h2>Create New Password</h2>
        <form action="Forgot_Password_2.php" method="POST"> 
            <div class="login-parameters">
                 <div class="input-field">
                    <!--<label for="name"><b>Email</b></label><br /> -->
					<input type="email" value="<?php echo $_SESSION['email'];?>" name="email" required>
                </div>
                <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="New Password" name="pswd" required>
                </div>
				    <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Confirm New Password" name="conpswd" required>
                </div>
                <!--<div style="margin-top: 10px; margin-left: 8%">
                    <a href="">Forgot Password?</a>
                     <input type="checkbox" name="remember">
                    <label for="remember">Remember me</label> -->
                    <!--                 
                    <input type="checkbox" checked="checked" style="width: 5%" name="remember">
                    <label  style="position: absolute; bottom: 18%;"for="remember">Remember me</label> 
                </div>-->
            </div>
            <button class="signInBtn" type="submit" name="frgt_btn"> <!--onclick="show_confirm()" value="Show confirm box"--> Save</button>
			
			<div style="margin-top: 20px;"> Login In? <button class="clickBtn" style="width:auto;" id="signupBtn"><a href="index.php">Click here</a></button>
                <!-- <button id="signupBtn" type="submit">Sign Up</button> -->
            </div>
            <!--<div style="margin-top: 20px;"> Haven't registered yet? <button class="clickBtn" onclick="document.getElementById('signupModal').style.display='block'"
                    style="width:auto;" href="" id="signupBtn">Click
                    here</button>
                <button id="signupBtn" type="submit">Sign Up</button> 
            </div>-->
        </form>
    </div>

</body>

</html>