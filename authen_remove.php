<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<?php
	unset($_SESSION['authen']);
?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Document</title>
</head>
<body>
<script language="javascript">
  window.location.replace("index.php");
</script>
</body>
</html>