<?php 
require 'pager.php';
$mysqli = new mysqli('localhost','root','','crud') or die('Connection Error');
$listRow = 5;	//每页展示数量
$sql = 'SELECT id FROM users;';
$data = $mysqli->query($sql);
$total = $data->num_rows;		//获取记录总数

$Pager = new Pager($total,$listRow,0,['query'=>['name'=>'admin'],'fragment'=>'top']);	//实例化分页类
$sql = "SELECT * FROM users LIMIT ".($Pager->getCurrentPage()-1) * $listRow ."," . $listRow;	//获取定量的数据条数
$data = $mysqli->query($sql);
 ?>
<!-- start: insert test data for pagination -->
 <?php
$mysqli = new mysqli('localhost','root','','crud') or die('Connection Error');
$sql1 = "INSERT INTO users(first_name,last_name,email,password,type) VALUES ('Junyi','ZHONG','male','jyzh@yahoo.com','Admin')";
for ($i=0; $i < 30; $i++) { 
    $mysqli->query($sql1);
}
?>
<!-- end: insert test data for pagination -->

<!-- start: delete test data for pagination -->
<?php
//$sql1 = "DElETE FROM users WHERE email = jyzh@yahoo.com";
//for ($i=0; $i < 30; $i++) { 
  //  $mysqli->query($sql1);
}

?>

<!-- end: delete test data for pagination -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>分页类</title>
	<link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="height: 800px">
<div class="container" style="text-align: center;display: flex;flex-direction: column;justify-content: center;height: 100%">
	<table class="table table-bordered">
		<caption>员工表</caption>
		<thead>
			<tr>
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
</body>
</html>