<?php

session_start();

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
			$response = '<script type = "text/javascript"> alert("Password must be at least 7 characters.") </script>';
		}
		else if(!$uppercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have 1 capital letter.") </script>';
		}
		else if(!$lowercase)
		{
			$response = '<script type = "text/javascript"> alert("Password must have 1 lower case letter.") </script>';
		}
		else if(!$numbers)
		{
			$response = '<script type = "text/javascript"> alert("Password must have least 1 number.") </script>';
		}
		else if(!$special_Char)
		{
			$response = '<script type = "text/javascript"> alert("Password must have least 1 special character.") </script>';
		}
		return $response;
	}

//Registration Code

if(isset($_POST['submit_btn']))
{
	
	
	$first_name = $_POST['first_name'];	
	$last_name = $_POST['last_name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$conf_password = $_POST['con_pswd'];
	
	$validate_mail = filter_var($email, FILTER_VALIDATE_EMAIL);
	
	
	$response = check_password($password);
	if($response == "OK")
	{
		if ($password == $conf_password)
		{
			$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);
			if($validate_mail)
			{
				//check for unique email
				$sql = "SELECT * FROM users WHERE email='$email'";
				$query_run = mysqli_query($db,$sql);
				$query_check = mysqli_num_rows($query_run);
				if($query_check == 1)
				{
					echo '<script type = "text/javascript"> alert("Email id already registered try another Email id.") </script>';
				}
				else
				{
					//create users
		
					$sql = "Insert into users (first_name, last_name, email, address, password, type) values ('$first_name','$last_name','$email','$address','$hash_password','User')";
					mysqli_query($db,$sql);
					echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
					//$_SESSION['message'] = "Registration successful";
					$_SESSION['first_name'] = $first_name;
					
					header("location: index.php");
				}
			}
			else
			{
				echo '<script type = "text/javascript"> alert("Email ID is invalid. Please enter a valid email ID. ") </script>';
			}
		}	
		else
		{
		//failed
			echo '<script type = "text/javascript"> alert("Password and confirm password does not match.") </script>';
		}
	}	
	else
	{
		echo $response;
	}	
	
}

//login code

		
		if(isset($_POST['login_btn']))
		{	
			
			$email = mysqli_real_escape_string($db,$_POST['email']);	
			$password = mysqli_real_escape_string($db,$_POST['pswd']);

				//$sqli = "SELECT * FROM users WHERE email='$email' AND password='$password'";	
				$sqli = "SELECT id,password FROM users WHERE email='$email'";
				$qrun = mysqli_query($db,$sqli);
				$qcheck = mysqli_num_rows($qrun);
				if($qcheck == 1)
				{
					$data = mysqli_fetch_array($qrun);
					if(password_verify($password, $data['password']))
					{	
						/*echo '<script type = "text/javascript"> alert("Welcome!") </script>';
						VALID
						$_SESSION['first_name'] = $first_name;	*/	
						$check_user = "SELECT * FROM users WHERE email='$email'";
						$connect = mysqli_query($db,$check_user);	
						$navigate = mysqli_fetch_array($connect);
						if($navigate['type'] == 'User')
						{
							//use session to save first_name and type then we could get form here.
							$_SESSION['first_name'] = $navigate['first_name'];
							$_SESSION['type']= $navigate['type'];
							//Navigating to user page
							//echo '<script type = "text/javascript"> alert("Welcome!") </script>'; //User_home/user-dashboard.html
							header('location: user-entrance/user-dashboard.php'); //redirecting to user's home page.
							//echo '<script type = "text/javascript"> alert("Email id already exists try another Email id ") </script>';	
						}
						else
						{	
							$_SESSION['first_name'] = $navigate['first_name'];
							$_SESSION['type']= $navigate['type'];
						//Navigating to admin page
						header('location: admin-entrance/useradmin/show-user.php');
						}
					}
					else
					{
						echo '<script type = "text/javascript"> alert("Incorrect password.") </script>';
					}	
				}	
				else
				{
					echo '<script type = "text/javascript"> alert("Invalid email address or password.") </script>';
				}
		}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Login/Registration - BigTree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="login_style.css">
</head>

<body>
	<div class="header">DIMOISEP IOT Management System</div>
	<div class="content">
    <div class="bg-image"></div>
    <img src="imgs/final.JPG" alt="Bigtree_logo">
    <div id="signupModal" class="modal">
        <form class="modal-content animate" action="index.php" method="POST">
            <div>
                <span style="text-align: center;" class="registration_title input-field">
                    Registration
                </span>
                <span class="close" onclick="document.getElementById('signupModal').style.display='none'">&times;</span></div>
            <div class="container">
                <div class="input-field">
                    <!-- <label for="fname"><b>First Name:</b></label><br /> -->
                    <input type="text" placeholder="First Name" name="first_name" required>
                </div>
                <div class="input-field">
                    <!-- <label for="lname"><b>Last Name:</b></label><br /> -->
                    <input type="text" placeholder="Last Name" name="last_name" required>
                </div>
                <div class="input-field">
                    <!-- <label for="mailid"><b>E-mail:</b></label><br /> -->
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <!-- <label for="pswd"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <div class="input-field">
                    <!-- <label for="con-pswd"><b>Confirm Password</b></label><br /> -->
                    <input type="password" placeholder="Confirm Password" name="con_pswd" required>
                </div> 				
				<div class="check">
                     <!--<label for="con-pswd"><b>Confirm Password</b></label><br /> -->
                    <input type="checkbox" name="terms" required> I agree to the <a href="admin-entrance/Terms&Conditions/show-conditions.php">Terms & Conditions</a></input>
                </div>
                <button class="signupBtn" type="submit" name="submit_btn">Sign Up</button>
            </div>
        </form>
		
		
    </div>
 
        </div> 
    <div class="login">
        <h1>Log In</h1>
        <form action="index.php" method="POST"> 
            <div class="login-parameters">
                <div class="input-field">
                    <!-- <label for="name"><b>Email</b></label><br /> -->
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="input-field">
                    <!-- <label for="psw"><b>Password</b></label><br /> -->
                    <input type="password" placeholder="Password" name="pswd" required>
                </div>
                <div style="margin-top: 10px; margin-left: 8%">
                    <a href="Forgot_Password.php">Forgot Password?</a>
                   
                </div>
            </div>
            <button class="signInBtn" type="submit" name="login_btn" >Sign In</button>
            <div style="margin-top: 20px;"> Haven't registered yet? <button class="clickBtn" onclick="document.getElementById('signupModal').style.display='block'"
                    style="width:auto;" href="" id="signupBtn">Click here</button>
             
            </div>
        </form>
    </div>
</div>
<div class="footer">
	<h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h5>
</div>

</body>

</html>