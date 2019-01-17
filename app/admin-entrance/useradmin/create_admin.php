<?php include('../functions.php'); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Admin admin</title>
	<link rel="stylesheet" type="text/css" href="../style.css">
	 <!-- 添加控制show-users的样式代码 -->
    <link rel="stylesheet" type="text/css" href="../useradmin/style.css">
    <link rel="stylesheet" type="text/css" href="../useradmin/nav.css">

    <link rel="stylesheet" type="text/css" href="../useradmin/searchbox/style.css">
    <script type="text/javascript" src="../useradmin/searchbox/function.js"></script>
</head>
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
        <?php //$row = mysqli_fetch_array($results) ?>
        <li><a href="show-user.php">User Management</a></li>
        <li><a href="create_admin.php">Add Admin</a></li>
       <!--  <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit Profile</a></li> -->
       <li><a href="edit-myprofile.php" >Edit Profile</a></li>
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
	<h2 style="text-align: center;margin-top: 50px;">Add Admin</h2>
	<form method="post" action="create_admin.php">

		<?php //echo display_error(); ?>

		<div class="input-group">
			<label>First Name</label>
			<input type="text" name="first_name"  placeholder=""> 
		</div>
		<div class="input-group">
			<label>Last Name</label>
			<input type="text" name="last_name" placeholder=""> 
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" placeholder=""> 
		</div>
		<!--<div class="input-group">
			<label>User type</label>
			<select name="user_type" id="user_type" >
				<!-- <option value=""></option> 
				<option value="admin">Admin</option>
				<!-- <option value="user">User</option> 
			</select>
		</div>-->
		<div class="input-group">
			<label>Password</label>
			<input type="password" placeholder="" name="password">
		</div>
		<div class="input-group">
			<label>Confirm password</label>
			<input type="password" placeholder="" name="con_pswd">
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="submit_btn"> Create admin</button>
		</div>
	</form>
	<div class="footer">
	<h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved! Powered By BIGTREE</h5>
</div>
</body>
</html>