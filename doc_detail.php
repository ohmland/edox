<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<?php require('web_config.php'); ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
  require('authen_role.php');

  if($authen_role<1){
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
  $rcid=$_GET['rcid'];
	require('doc_select.php');
?>
หมายเลขบันทึก : <?php echo($rcid); ?><br />
วันที่บันทึก : <?php echo date_format(date_create($rcdate),"d/m/Y"); ?><br />
หมวดหนังสือ : <?php echo($arrdoccate[$doccate]); ?><br />
เลขที่หนังสือ : <?php echo($docid); ?><br />
วันที่ออก : <?php echo date_format(date_create($docdate),"d/m/Y"); ?><br />
ชนิดหนังสือ : <?php echo($arrdoctype[$doctype]); ?><br />
เรื่อง : <?php echo($docsubj); ?><br />
ผู้ออก : <?php echo($docauth); ?><br />
เนื้อความ(ย่อ) : <br /><?php echo(str_replace("\n","<br />", $doccont)); ?><br />
Link &gt;&gt; : <a href="file_detail.php?rcid=<?php echo($rcid); ?>" target="_blank">เอกสาร</a>
<br /><br /><br />
<a href="doc_form.php?rcid=<?php echo($rcid); ?>">แก้ไข</a>
<a href="javascript:rmdoc('<?php echo($rcid); ?>');">ลบ</a>
<a href="javascript:window.history.back();">กลับ</a>
<script language="javascript">
	function rmdoc(v1) {
		var url="doc_delete.php?rcid=" + v1;
		var r=confirm("ยืนยันการลบข้อมูล");
		if(r==true) {
			window.location.href=url;
		}
	}
</script>
</body>
</html>