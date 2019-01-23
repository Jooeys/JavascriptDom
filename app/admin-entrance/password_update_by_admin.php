<?php 

// session_start();

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

//Edit Admin/User Profile

if(isset($_POST['update']))
{
	

	$password = $_POST['password'];
	$conf_password = $_POST['con_pswd'];
		
	$response = check_password($password);
	if($response == "OK")
	{
		if ($password == $conf_password)
		{
			$hash_password = password_hash($password, PASSWORD_DEFAULT);//$password = md5($password);
		}else{
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