<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<?php require('web_config.php'); ?>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>E-Document</title>
</head>
<body>
<?php
	require('authen_role.php');
	require('web_mainmenu.php');
  if($authenrole<1){
		require('authen_form.php');
	} else {
		require('doc_list.php');
	}
?>
</body>
</html>