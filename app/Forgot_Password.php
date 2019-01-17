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
    <style>
    </style>
    <script>
    </script>
</head>

<body>

    <div class="bg-image"></div>
    <!-- <div class="header">
            <img src="Bigtree_logo.JPG" alt="Bigtree_logo" width="100" height="100"><h1> BIGTREE</h1>
        </div> -->

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
                <!--<div class="input-field">
                     <label for="psw"><b>Password</b></label><br /> 
                    <input type="password" placeholder="New Password" name="pswd" required>
                </div>
				    <div class="input-field">
                     <label for="psw"><b>Password</b></label><br /> 
                    <input type="password" placeholder="Confirm New Password" name="conpswd" required>
                </div>-->
                <!--<div style="margin-top: 10px; margin-left: 8%">
                    <a href="">Forgot Password?</a>
                     <input type="checkbox" name="remember">
                    <label for="remember">Remember me</label> -->
                    <!--                 
                    <input type="checkbox" checked="checked" style="width: 5%" name="remember">
                    <label  style="position: absolute; bottom: 18%;"for="remember">Remember me</label> 
                </div>-->
            </div>
            <button class="signInBtn" type="submit" name="frgt_btn">Confirm</button>
			
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


    <!-- <script>
            // Get the modal
            var modal = document.getElementById('signupModal');

            // Get the button that opens the modal
            var btn = document.getElementById("signupBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // modal.style.display="none";


            // When the user clicks the button, open the modal 
            btn.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function () {
                modal.style.display = "none";
            }

            // // When the user clicks anywhere outside of the modal, close it
            // window.onclick = function (event) {
            //     if (event.target == modal) {
            //         modal.style.display = "none";
            //     }
            // }
        </script> -->

</body>

</html>