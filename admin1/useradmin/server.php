<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$id = 0;
	$first_name = "";
	$last_name = "";
	$email = "";
	$password = "";
	$address = "";
	$type = "";
	$update = false;
	$change_password = true;

	// edit FAQ
	if (isset($_POST['save_post'])) {
		$faq_text = $_POST['faq_text'];
	
		mysqli_query($db, "INSERT INTO faq (id, faq_text) VALUES ('$id','$faq_text')");
		$_SESSION['message'] = "FAQ infomation saved";
		header('location: show-faq.php');
	}
	if (isset($_POST['update_post'])) {
		$faq_text = $_POST['faq_text'];
	
		mysqli_query($db, "UPDATE INTO faq (id, faq_text) VALUES ('$id','$faq_text')");
		$_SESSION['message'] = "FAQ infomation saved";
		header('location: show-faq.php');
	}
	// edit terms and conditions
	if (isset($_POST['save_terms'])) {
		$faq_text = $_POST['terms_text'];
	
		mysqli_query($db, "INSERT INTO terms (id, terms_text) VALUES ('$id','$terms_text')");
		$_SESSION['message'] = "Terms infomation saved";
		header('location: show-condition.php');
	}
	if (isset($_POST['update_terms'])) {
		$faq_text = $_POST['terms_text'];
	
		mysqli_query($db, "UPDATE INTO terms (id, terms_text) VALUES ('$id','$terms_text')");
		$_SESSION['message'] = "Terms infomation saved";
		header('location: show-condition.php');
	}

	if (isset($_POST['save'])) {
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		// $password = md5($_POST['password']);
		$password = $_POST['password'];
		$address = $_POST['address'];
		$type = $_POST['type'];

		mysqli_query($db, "INSERT INTO users (first_name,last_name,email,password,type) VALUES ('$first_name','$last_name','$email','$password','$type')");
		$_SESSION['message'] = "User infomation saved";
		header('location: show-user.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$first_name = $_POST['first_name'];
		$last_name = $_POST['last_name'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$type = $_POST['type'];

		mysqli_query($db, "UPDATE users SET first_name='$first_name',last_name='$last_name',email='$email',password='$password',type='$type' WHERE id=$id");
		$_SESSION['message'] = "Profile infomation updated!"; 
		header('location: show-user.php');
	}

	if (isset($_POST['change_password'])) {
		$email = $_POST['email'];
		$password = $_POST['password'];

		mysqli_query($db, "UPDATE users SET new_password='$password' WHERE id=$id");
		$_SESSION['message'] = "Password successfully changed!"; 
		header('location: show-user.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM users WHERE id=$id");
		$_SESSION['message'] = "User has been deleted!";
		header('location: show-user.php');
	}
	if (isset($_GET['page'])) {
    		$page = (int) $_GET['page'];
		} else {
   		 	$page = 1;
	}

	$results = mysqli_query($db, "SELECT * FROM users ORDER BY id DESC");


?>