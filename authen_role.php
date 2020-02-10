<?php
if(isset($_SESSION['authen']['id'])) {
	$authenid=$_SESSION['authen']['id'];
}
else {
	$authenid="";
}

if(isset($_SESSION['authen']['pwd'])) {
	$authenpwd=$_SESSION['authen']['pwd'];
}
else {
	$authenpwd="";
}

$sql="SELECT urole FROM users WHERE uid='$authenid' AND upwd='$authenpwd'";
require('mysql/connect.php');
$record=mysqli_fetch_array($result);
$authenrole=(int)$record[0];
require('mysql/unconn.php');
?>