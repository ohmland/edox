<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<?php
  require('authen_role.php');

  if($authen_role<1) {
?>
<script language="javascript">
  alert('กรุณาทำการลงทะเบียนเข้าสู่ระบบ');
  window.close();
</script>

<?php
  exit();
?>

<?php
	}
$rcid=$_GET['rcid'];
require('doc_select.php');
if($flcont!="") {
	header("Content-type:$fltype");
	echo($flcont);
}
else {
?>
	<script language="javascript">
		alert('ไม่สามารถแสดงไฟล์เอกสารนี้ได้');
		window.close();
	</script>
<?php
}
?>