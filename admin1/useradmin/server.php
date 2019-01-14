<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$id = 0;
	$firstname = "";
	$lastname = "";
	$email = "";
	$password = "";
	$address = "";
	$usertype = "";
	$title = "";
	$body = "";
	$update_post = false;
    $save_post = false;
	$update = false;
	$change_password = true;

	if (isset($_POST['save'])) {
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		// $password = md5($_POST['password']);
		$password = $_POST['password'];
		$address = $_POST['address'];
		$usertype = $_POST['usertype'];

		mysqli_query($db, "INSERT INTO info (firstname,lastname,email,password,address,usertype) VALUES ('$firstname','$lastname','$email','$password','$address','$usertype')");
		$_SESSION['message'] = "User infomation saved";
		header('location: show-user.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$address = $_POST['address'];
		$usertype = $_POST['usertype'];

		mysqli_query($db, "UPDATE info SET firstname='$firstname',lastname='$lastname',email='$email',password='$password',address='$address',usertype='$usertype' WHERE id=$id");
		$_SESSION['message'] = "Profile infomation updated!"; 
		header('location: show-user.php');
	}

	if (isset($_POST['change_password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		mysqli_query($db, "UPDATE info SET new_password='$password' WHERE id=$id");
		$_SESSION['message'] = "Password successfully changed!"; 
		header('location: show-user.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		$_SESSION['message'] = "User has been deleted!";
		header('location: show-user.php');
	}
	if (isset($_GET['page'])) {
    		$page = (int) $_GET['page'];
		} else {
   		 	$page = 1;
	}
	//FAQ: update_post and save_post
	if (isset($_POST['update_post'])){
		$title = $_POST['title'];
		$body = $_POST['body'];

		mysqli_query($db, "UPDATE faq SET title='$title',body='$body'WHERE id=$id");
		$_SESSION['message'] = "FAQ updated!"; 
		header('location: show-condition.php');

	}

	if (isset($_POST['save_post'])){
		$title = $_POST['title'];
		$body = $_POST['body'];

		mysqli_query($db, "INSERT faq SET title='$title',body='$body'WHERE id=$id");
		$_SESSION['message'] = "FAQ saved!"; 
		header('location: show-condition.php');

	}


	$results = mysqli_query($db, "SELECT * FROM info ORDER BY id DESC");


?>