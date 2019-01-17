<?php
/*
* Project : DOMISEP
* Developer/s : BIGTREE
* Date : 20/12/2018
* version : 1
*/

session_start();

$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

//Adding conditions to the database.

if(isset($_POST['terms_btn']))
{
	$Terms = $_POST['terms'];	
	$insert = "Insert into terms (value) values ('$Terms')";
	mysqli_query($db,$insert);
	echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
	//$_SESSION['message'] = "Registration successful";
	//$_SESSION['first_name'] = $first_name;
	header("location: terms.php");
}

if(isset($_POST['Delete_last_btn']))
{
	$Terms = $_POST['terms'];	
	$delete = "DELETE FROM terms ORDER BY id DESC LIMIT 1"; // "Insert into terms (value) values ('$Terms')";
	mysqli_query($db,$delete);
	//echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
	//$_SESSION['message'] = "Registration successful";
	//$_SESSION['first_name'] = $first_name;
	header("location: terms.php");
}

if(isset($_POST['Delete_all_btn']))
{
	$Terms = $_POST['terms'];	
	$delete = "TRUNCATE TABLE terms"; // "Insert into terms (value) values ('$Terms')";
	mysqli_query($db,$delete);
	//echo '<script type = "text/javascript"> alert("Registration successful. Please login to use the website.") </script>';
	//$_SESSION['message'] = "Registration successful";
	//$_SESSION['first_name'] = $first_name;
	header("location: terms.php");
}

//TRUNCATE TABLE terms;

//DELETE FROM terms WHERE value=1 ORDER BY datetime DESC LIMIT 1
//DELETE FROM terms WHERE ID = (SELECT MAX(ID) FROM 'terms');
//DELETE FROM terms ORDER BY id DESC LIMIT 1;
	
	
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>BigTree</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/login_styles.css">
    <style>
    </style>
    <script>
    </script>
</head>

<body>

    <div class="bg-image"></div>
   
    <!-- <div class="header"><button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Login</button></div> -->
    <div id="signupModal" class="modal">
        <form class="modal-content animate" action="terms.php" method="POST">
            <div class="container">
                <div class="input-field">
                    <!-- <label for="fname"><b>First Name:</b></label><br /> -->
                    Terms and conditions: <textarea name="terms" placeholder="Adding terms and conditions" rows="4"></textarea><br>
                </div>
<!--<input type="text" placeholder="Adding terms and conditions" name="terms" required>-->
                <button class="signupBtn" type="submit" name="terms_btn">Submit</button>
				<div>
				<?php 
				
					$db = mysqli_connect("localhost","root","","bigtree");// or die('unable to connect');

					$sql = "SELECT * FROM terms";
					$query_run = mysqli_query($db,$sql);
					$query_check = mysqli_num_rows($query_run);
					if($query_check > 0 )
					{	
						while($row = mysqli_fetch_assoc($query_run))
						{
							$term = $row['value'];
							echo "<div class='tnc'><p class='display'>$term</p></div>";
						}
					}
					else
					{
						echo '<script type = "text/javascript"> alert("No terms and conditions present in database") </script>';
					}
				?>
				</div>
				
				<div>
					<button class="signupBtn" type="submit" name="Delete_all_btn">Delete All</button>
					<button class="signupBtn" type="submit" name="Delete_last_btn">Delete Last entry</button>
				</div>
            </div>
        </form>
		
		
    </div>
   
 

</body>

</html>