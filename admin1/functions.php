<?php 

session_start();

$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

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
	/*$first_name = mysqli_real_escape_string($db,$_POST['first_name']);	
	$last_name = mysqli_real_escape_string($db,$_POST['last_name']);
	$email = mysqli_real_escape_string($db,$_POST['email']);
	$password = mysqli_real_escape_string($db,$_POST['password']);
	$conf_password = mysqli_real_escape_string($db,$_POST['con_pswd']);
	//$user_type = $_POST['type'];*/
	
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
		
					$sql = "Insert into users (first_name, last_name, email, password, type) values ('$first_name','$last_name','$email','$hash_password','Admin')";
					mysqli_query($db,$sql);
					echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
					//$_SESSION['message'] = "Registration successful";
					$_SESSION['first_name'] = $first_name;
					header("location: create_admin.php");
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

?>