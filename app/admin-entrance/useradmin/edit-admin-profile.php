<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;

		$results = mysqli_query($db, "SELECT * FROM users WHERE id=$id");
		$n = mysqli_fetch_array($results);
		$first_name = $n['first_name'];
		$last_name = $n['last_name'];
		$email = $n['email'];
		$password = $n['password'];
		$type = $n['type'];
	}
?>  
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
    <ul class="top-nav" style="width: 75%;float: left;display: inline-block;">
        <?php $row = mysqli_fetch_array($results) ?>
        <li><a href="show-user.php">User Management</a></li>
        <li><a href="create_admin.php">Add Admin</a></li>
        <li><a href="edit-faq.php?edit=<?php echo $row['id']; ?>" >Edit FAQ</a></li>
        <li><a href="edit-condition.php">Privacy&Terms</a></li>
        <li><img src="../images/boss.png" style="margin:0px 0px 0px 280px;"></li>
        <div style="margin: 2px 2px;">
            <?php  if (isset($_SESSION['first_name'])) : ?>
                <strong style="font-size: x-large;"><?php echo $_SESSION['first_name']; ?></strong>
                <small>
                    <i  style="color: #888;margin-right: 1px;">(<?php echo ucfirst($_SESSION['type']); ?>)</i>
                    <button class="logout_btn"><a href="../../index.php?logout='1'" style="text-decoration: none;">logout</a></button>
                 
                </small>

            <?php endif ?>
        </div>
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

		<!-- user information -->
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

<?php $results = mysqli_query($db, "SELECT * FROM users"); ?>

<h2 style="text-align: center;margin-top: 40px;">Edit Admin/User Profile</h2>
<form method="post" action="server.php" style="background-color: darkgrey;">

	<!-- <input type="hidden" name="id" value="<?php echo $id; ?>"> -->
	<div class="input-group">
		<label>ID</label>
		<input type="text" name="id" value="<?php echo $id; ?>">
	</div>
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
	<!-- <div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >	
				<option value="admin">Admin</option>
				<option value="user">User</option> 
			</select>
	</div> -->
	<div class="input-group">
		<label>New Password</label>
		<input type="password" placeholder="" name="password">
	</div>
	<div class="input-group">
		<label>Confirm Password</label>
		<input type="password" placeholder="" name="con_pswd">
	</div>
	<!-- changing password for  admin and user , did them the same as sybmit_btn?-->
	<!-- <?php //include('../password_update_by_admin.php'); ?> -->
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