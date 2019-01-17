<!-- <?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

		if (count($record == 1)) {
			$n = mysqli_fetch_array($record);
			$firstname = $n['first_name'];
			$lastname = $n['last_name'];
			$email = $n['email'];
			$password = $n['password'];
			$address = $n['address'];
			$usertype = $n['usertype'];
		}

	}
?>  -->
<?php error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	
	<!-- 添加控制show-users的样式代码 -->
	<link rel="stylesheet" type="text/css" href="../useradmin/style.css">
	<link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

	<link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
	<script type="text/javascript" src="../useradmin/searchbox/function.js"></script>
</head>
<body>
<div class="header">
    <!-- start: Header Menu Team logo -->
    <div class="logo">
        <img src="logo.jpg" style="float: left;width: 75px;height: 75px;">
        <span style="float:left;color:white;padding:20px 20px;position:relative;font-family: Arial;font-size: 24px;margin-top: 10px;">ADMIN-DOMISEP</span>
    </div>
    <!-- end: Header Menu Team logo -->
    <ul class="top-nav" style="width: 75%;float: left;display: inline-flex;">
        <?php $row = mysqli_fetch_array($results) ?>
        <li><a href="show-user.php">User Management</a></li>
        <li><a href="create_admin.php">Add Admin</a></li>
        <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit User Profile</a></li>
        <li><a href="edit-faq.php?edit=<?php echo $row['id']; ?>" >Edit FAQ</a></li>
        <li><a href="edit-condition.php">Privacy&Terms</a></li>
        
        <li><a href="change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
        <li><img src="../images/boss.png" style="margin:0px 10px 0px 100px;"></li>
        <div style="margin: 20px 20px;">
            <?php  if (isset($_SESSION['user'])) : ?>
                <strong style="font-size: x-large;"><?php echo $_SESSION['user']['username']; ?></strong>
                <small>
                    <i  style="color: #888;margin-right: 20px;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    
                    <a href="../../index.php?logout='1'" style="color: red;font-size: x-large;">logout</a>
                 
                </small>

            <?php endif ?>
        </div>
        <?php ?>
    </ul>
</div>
	<div class="content">
		<!-- notification message -->
		<?php if (isset($_SESSION['success'])) : ?>
			<div class="error success" >
				<h3>
					<?php 
						echo $_SESSION['success']; 
						unset($_SESSION['success']);
					?>
				</h3>
			</div>
		<?php endif ?>

		<!-- logged in user information -->
		<div class="profile_info" style="margin: -20px;">
        </div>
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>

	

<h2 style="text-align: center;margin-top: 40px;">Edit Admin Profile</h2>
<form method="post" action="server.php" style="background-color: darkgrey;">

	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<div class="input-group">
		<label>First Name</label>
		<input type="text" name="first_name" value="<?php echo $first_name; ?>">
	</div>
	<div class="input-group">
		<label>Last Name</label>
		<input type="text" name="last_name" value="<?php echo $last_name; ?>">
	</div>
	<div class="input-group">
		<label>Email</label>
		<input type="text" name="email" value="<?php echo $email; ?>">
	</div>
	<div class="input-group">
		<label>UserType</label>
		<input type="text" name="type" value="<?php echo $type; ?>">
	</div>
	<div class="input-group">
		<label>New Password</label>
		<input type="password" name="new_password" autocomplete="off" required/>
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" autocomplete="off" required/>
	</div>
	<div class="input-group">

		<?php if ($update == true): ?>
			<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
		<?php else: ?>
			<button class="btn" type="submit" name="save" >Save</button>
		<?php endif ?>
	</div>
</form>
    </div>

    <div class="footer">
        <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
    </div>
</body>
</html>