<?php 
	include('../functions.php');

	if (!isAdmin()) {
		$_SESSION['msg'] = "You must log in first";
		header('location: ../login.php');
	}

?>
<?php $results = mysqli_query($db, "SELECT * FROM info"); ?> <!-- 解决警示问题 -->

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	<style>
	.header {
		background: #444;
	}
	button[name=register_btn] {
		background: #444;
	}
	</style>
	<!-- 添加控制show-users的样式代码 -->
	<link rel="stylesheet" type="text/css" href="../useradmin/style.css">
	<link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

	<link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
	<script type="text/javascript" src="../useradmin/searchbox/function.js"></script>
</head>
<body>
	<div class="header">
		<h2>Admin - Home Page</h2>
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
            <ul class="top-nav" style="width: 100%;float: left;display: block;">
                <li><a href="../useradmin/create_admin.php">Add User</a></li>
                <li><a href="../useradmin/edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit My Profile</a></li>
                <li><a href="../useradmin/show-user.php">User tables</a></li>
                <li><a href="../useradmin/admin-table.php">Admin tables</a></li>
                <li><a href="../useradmin/change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
                <img src="../images/boss.png"  >
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


	<!-- merge show-user.php -->

	


</body>
</html>