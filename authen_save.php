<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<?php
	$loginid = $_POST['loginid'];
	$loginpwd = $_POST['loginpwd'];
	$sql = "SELECT COUNT(uid) FROM users WHERE uid='$loginid' AND upwd='$loginpwd'";
	
	require('mysql/connect.php');
	$record=mysqli_fetch_array($result);
	$usercount=(int)$record[0];
	require('mysql/unconn.php');

	if($usercount > 0) {
		$v1 = 1;
		$msg = "ยินดีต้อนรับ";
		$_SESSION['authen']['id'] = $loginid;
		$_SESSION['authen']['pwd'] = $loginpwd;
	}
	else {
		$v1 = 0;
		$msg = "การลงชื่อเข้าสู่ระบบไม่ถูกต้อง";
		unset($_SESSION['authen']);
	}
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Document</title>
</head>
<body>
<script language="javascript">
  var v1=<?php echo($v1); ?>;
  alert('<?php echo($msg); ?>');
  if(v1==1) {
    window.location.replace("index.php");
  }
  else {
    window.history.back();
  }
</script>
</body>
</html>