<?php
$mysqli = new mysqli('localhost','root','','crud') or die('Connection Error');
$sql1 = "INSERT INTO users(first_name,last_name,email,password,type) VALUES ('Junyi','ZHONG','male','jyzh@yahoo.com','Admin')";
for ($i=0; $i < 30; $i++) { 
    $mysqli->query($sql1);
}
?>
