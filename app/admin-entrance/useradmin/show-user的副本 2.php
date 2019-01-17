<?php 
include('server.php');
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($db, "SELECT * FROM users WHERE id=$id");

		if (count($record == 1)) {
			$n = mysqli_fetch_array($record);
			$first_name = $n['first_name'];
			$last_name = $n['last_name'];
			$email = $n['email'];
			$password = $n['password'];
			// $address = $n['address'];
			$type = $n['type'];
		}

	}


?> 

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
        <li><a href="myprofile.php">Add Admin</a></li>
        <li><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" >Edit Profile</a></li>
        <li><a href="edit-faq.php?edit=<?php echo $row['id']; ?>" >Edit FAQ</a></li>
        <li><a href="Privacy&Terms.php">Privacy&Terms</a></li>
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



<!--Search box for admin users-->

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search first_name..."style="margin-top: 20px;margin-bottom: auto;">
<!-- when user manipulate database show messages here -->
	<?php if (isset($_SESSION['message'])): ?>
		<div class="msg">
			<?php 
				echo $_SESSION['message']; 
				unset($_SESSION['message']);
			?>
		</div>
	<?php endif ?>

<!--start: pagination script -->


<!--end: pagination script -->

<?php $results = mysqli_query($db, "SELECT * FROM users order by id desc"); ?>

<table id="myTable"> 
    <tr class="header">   
      <th>ID</th>
      <th>first_name</th>
      <th>last_name</th>
      <th>Email</th>
      <th>Password</th>
      <!-- <th>Address</th> -->
      <th>Type</th>
      <th colspan="5">Action</th>
    </tr>

	<?php while ($row = mysqli_fetch_array($results)) { ?>
	<tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['first_name']; ?></td>
		<td><?php echo $row['last_name']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><?php echo $row['password']; ?></td> 
		<!-- <td><?php echo $row['address']; ?></td> -->
		<td><?php echo $row['type']; ?></td>
		<td><a href="edit-myprofile.php?edit=<?php echo $row['id']; ?>" class="edit_btn">Edit</a></td>
		<td><a href="server.php?del=<?php echo $row['id']; ?>" class="del_btn">Delete</a></td>
	</tr>
<?php } ?>


<!--start: pagination -->
	
    <tr>
   		<td colspan="10"><?php echo $row['page'];?>
		    <a href="page.php?page=1">首页</a>
		    <a href="page.php?page=' . ($page - 1) . '">上一页</a>
		    <a href="page.php?page=' . ($page + 1) . '">下一页</a>
		    <a href="page.php?page=' . $total . '">尾页</a>
		    当前是第 ' . $page . '页  共' . $total . '页
    	</td>
    </tr>
<!--end: pagination  -->
</table>

 	</div>
    <div class="footer">
        <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
    </div>


</body>
</html>