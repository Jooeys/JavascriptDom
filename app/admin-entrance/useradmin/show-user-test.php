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

	<!-- pagination -->
	<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	
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
        <li><img src="../images/boss.png" style="margin:0px 10px 0px 500px;"></li>
        <div style="margin: 2px 2px;">
            <?php  if (isset($_SESSION['first_name'])) : ?>
                <strong style="font-size: x-large;"><?php echo $_SESSION['first_name']; ?></strong>
                <small>
                    <i  style="color: #888;margin-right: 1px;">(<?php echo ucfirst($_SESSION['type']); ?>)</i>&nbsp;
                    <button class="logout_btn"><a href="../../index.php?logout='1'" style="text-decoration: none;">logout</a></button>
                 
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

<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search first_name..."style="margin:20px 130px;margin-bottom: auto;">
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
<?php 
require 'pager.php';
$mysqli = new mysqli('localhost','root','','crud') or die('Connection Error');
$listRow = 4;	//每页展示数量
$sql = 'SELECT id FROM users;';
$data = $mysqli->query($sql);
$total = $data->num_rows;		//获取记录总数

$Pager = new Pager($total,$listRow,0,['query'=>['name'=>'admin'],'fragment'=>'top']);	//实例化分页类
$sql = "SELECT * FROM users LIMIT ".($Pager->getCurrentPage()-1) * $listRow ."," . $listRow;	//获取定量的数据条数
$data = $mysqli->query($sql);
 ?>

	<table class="myTable" style="width: 80%;height: 200px;">
		<caption>Users Table</caption>
		<thead>
			<tr class="header">   
				<th>ID</th>
		        <th>first_name</th>
		        <th>last_name</th>
		        <th>Email</th>
		        <th>Type</th>
		        <th colspan="5">Action</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				while ($row = mysqli_fetch_object($data)) {
			 ?>
			<tr>
				<td><?php echo $row->id ?></td>
				<td><?php echo $row->first_name ?></td>
				<td><?php echo $row->last_name ?></td>
				<td><?php echo $row->email ?></td>
				<td><?php echo $row->type ?></td>
				<td><a href="edit-admin-profile.php?edit=<?php echo $row->id ?>" class="edit_btn">Edit</a></td>
				<td><a href="server.php?del=<?php echo $row->id ?>" class="del_btn">Delete</a></td>
			</tr>
			<?php 
				}
			 ?>
		</tbody>
	</table>
	<div class="page">
	<hr>
		<?php echo $Pager->render() ?>
	</div>
</div>
<!--end: pagination  -->

 	</div>
    <div class="footer">
        <h5 style="text-align: center; font-family: Hei; ">User Admin - 2019 © DOMISEP all rights reserved!</h5>
    </div>


</body>
</html>