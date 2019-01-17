<?php include('../functions.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Admin admin</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
		.header {
			background: #444;
		}
		button[name=register_btn] {
			background: #444;
		}
	</style>
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
        <li><a href="../useradmin/myprofile.php">Add Admin</a></li>
        <li><a href="../useradmin/edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit Profile</a></li>
        <li><a href="../useradmin/edit-faq.php?edit=<?php echo $row['id']; ?>" >Edit FAQ</a></li>
        <li><a href="../useradmin/Privacy&Terms.php">Privacy&Terms</a></li>
        <li><a href="../useradmin/show-user.php">User Management</a></li>
        <li><a href="../useradmin/change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
        <li><img src="../images/boss.png" style="margin:0px 10px 0px 100px;"></li>
        <div>
            <?php  if (isset($_SESSION['user'])) : ?>
                <strong><?php echo $_SESSION['user']['username']; ?></strong>
                <small>
                    <i  style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                    <br>
                    <a href="../admin/home.php?logout='1'" style="color: red;">logout</a>&nbsp;&nbsp;
                    <a href="../admin/create_admin.php"> login</a>
                </small>

            <?php endif ?>
        </div>
        <?php ?>
    </ul>
</div>
	
	<form method="post" action="create_admin.php">

		<?php echo display_error(); ?>

		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" value="<?php echo $username; ?>">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="<?php echo $email; ?>">
		</div>
		<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<!-- <option value=""></option> -->
				<option value="admin">Admin</option>
				<!-- <option value="user">User</option> -->
			</select>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password_1">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" name="password_2">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="register_btn"> + Create admin</button>
		</div>
	</form>
</body>
</html>