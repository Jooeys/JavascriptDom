<?php

include 'server.php';


$count_sql = 'select count(id) as c from info';

$result = mysqli_query($conn, $count_sql);

$data = mysqli_fetch_assoc($result);

//得到总的用户数
$count = $data['c'];

$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;

/*
if (isset($_GET['page'])) {
    $page = (int) $_GET['page'];
} else {
    $page = 1;
}
 */

//每页显示数

$num = 5;

//得到总页数
$total = ceil($count / $num);

if ($page <= 1) {
	$page = 1;
}

if ($page >= $total) {
	$page = $total;
}


$offset = ($page - 1) * $num;

$sql = "select id,username,createtime,createip from info order by id desc limit $offset , $num";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result)) {

	//存在数据则循环将数据显示出来

	echo '<table width="80%" border="1">';

	while ($row = mysqli_fetch_assoc($result)) {

		echo '<tr>';

		echo '<td>' . $row['username'] . '</td>';
		echo '<td>' . date('Y-m-d H:i:s', $row['createtime']) . '</td>';
		echo '<td>' . long2ip($row['createip']) . '</td>';
		echo '<td><a href="edit.php?id=' . $row['id'] . '">编辑用户</a></td>';
		echo '<td><a href="delete.php?id=' . $row['id'] . '">删除用户</a></td>';

		echo '</tr>';
	}

	echo '<tr>
    <td colspan="5">
    <a href="page.php?page=1">首页</a>
    <a href="page.php?page=' . ($page - 1) . '">上一页</a>
    <a href="page.php?page=' . ($page + 1) . '">下一页</a>
    <a href="page.php?page=' . $total . '">尾页</a>
    当前是第 ' . $page . '页  共' . $total . '页
    </td>
    </tr>';

	echo '</table>';

} else {
	echo '没有数据';
}

mysqli_close($conn);

