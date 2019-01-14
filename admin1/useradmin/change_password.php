<!-- <?php
include('server.php');
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $change_password = true;
    $record = mysqli_query($db, "SELECT * FROM info WHERE id=$id");

    if (count($record == 1)) {
        $n = mysqli_fetch_array($record);
        $firstname = $n['firstname'];
        $lastname = $n['lastname'];
        $email = $n['email'];
        $password = $n['password'];
        $address = $n['address'];
        $usertype = $n['usertype'];
    }

}

?> -->

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
        <li><a href="create_admin.php">Add Admin</a></li>
        <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit Profile</a></li>
        <li><a href="edit-faq.php?edit=<?php echo $row['id']; ?>" >Edit FAQ</a></li>
        <li><a href="edit-condition.php">Privacy&Terms</a></li>
        <li><a href="show-user.php">User Management</a></li>
        <li><a href="change_password.php?edit=<?php echo $row['id']; ?>" >Change Password</a></li>
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


<?php $results = mysqli_query($db, "SELECT * FROM info"); ?>
<h2 style="text-align: center;margin-top: 40px;">Change Password</h2>

<form method="post" action="server.php" style="background-color: darkgrey;>

	<input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="input-group">
        <label>User Email</label>
        <input type="text" name="email" value="<?php echo $email; ?>"> 
    </div>
	<div class="input-group">
		<label>Current Password</label>
        <input type="password" name="current_password" value="<?php echo $password; ?>"> 
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
        <button class="btn" type="submit" name="change_password" style="background: #556B2F;">Change Password</button>
    </div>
</form>
        <?php ?>
    </div>
    <div class="footer">
        <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
    </div>
</body>
</html>