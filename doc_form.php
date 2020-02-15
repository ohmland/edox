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

  if($authenrole<1){
?>
<script language="javascript">
  alert('กรุณาทำการลงทะเบียนเข้าสู่ระบบ');
  window.location.replace("authen_remove.php");
</script>

<?php
  exit();
?>

<?php
	}
?>

<?php require('web_mainmenu.php'); ?>

<?php
if(isset($_GET['rcid'])) {
	$action = "doc_update.php";
	$rcid = $_GET['rcid'];
	require('doc_select.php');
	$rcdate = date_format(date_create($rcdate),"Y-m-d");
	$docdate = date_format(date_create($docdate),"Y-m-d");
}
else {
	$action = "doc_insert.php";
	$rcid = "";
	$rcdate = date("Y-m-d");
	$doccate = 0;
	$docid = "";
	$docdate = date("Y-m-d");
	$doctype = 0;
	$docsubj = "";
	$doccont = "";
	$docauth = "";
}

$oldid = $rcid;
?>
<form action="<?php echo ($action); ?>" method="post" 
	enctype="multipart/form-data" name="doc_form" target="_self">
	<input name="oldid" type="hidden" value="<?php echo($oldid); ?>">
	หมายเลขบันทึก : <input name="rcid" type="text" value="<?php echo($rcid); ?>"><br />

	วันที่บันทึก : <input name="rcdate" type="date" value="<?php echo($rcdate); ?>"><br />

	หมวดหนังสือ : 
	<select name="doccate" id="doccate">
		<option value="0">เอกสารเข้า</option>
		<option value="1">เอกสารออก</option>
	</select>
	<br />
	เลขที่หนังสือ : <input name="docid" type="text" value="<?php echo($docid); ?>"><br />
	วันที่ออก : <input name="docdate" type="date" value="<?php echo($docdate); ?>"><br />

	ชนิดหนังสือ : 
	<select name="doctype" id="doctype">
		<?php for($i=0;$i<count($arrdoctype);$i++) {?>
			<option value="<?php echo($i); ?>"><?php echo($arrdoctype[$i]); ?></option>
		<?php }?>
	</select>
	<br />
	เรื่อง : <input name="docsubj" type="text" value="<?php echo($docsubj); ?>"><br />
	ผู้ออก : <input name="docauth" type="text" value="<?php echo($docauth); ?>"><br />
	เนื้อความ(ย่อ) : <br />
		<textarea name="doccont" col="50" rows="5"><?php echo($doccont); ?></textarea>
		<br />
	ไฟล์ : <input name="docfile" type="file">
	<br /><br /><br />
	<input name="submit" type="submit" value="บันทึก">
	<input name="reset" type="reset" value="ยกเลิก">
	<a href="javascript:window.history.back();">กลับ</a>
</form>
<script language="javascript">
	document.getElementById('doccate').value="<?php echo($doccate);?>";
	document.getElementById('doctype').value="<?php echo($doctype);?>";
</script>
</body>
</html>