<?php session_start(); ?>
<?php require('mysql/config.php'); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset=utf-8 />
  <title>E-Document</title>
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

  $rcid=$_POST['rcid'];
  $rcdate=$_POST['rcdate'];
  $doccate=$_POST['doccate'];
  $docid=$_POST['docid'];
  $docdate=$_POST['docdate'];
  $doctype=$_POST['doctype'];
  $docsubj=$_POST['docsubj'];
  $doccont=$_POST['doccont'];
  $docauth=$_POST['docauth'];

  if($_FILES['docfile']['error']==0) {
    $fltype=$_FILES['docfile']['type'];
    $tmpName=$_FILES['docfile']['tmp_name'];
    $fp=fopen($tmpName,'r');
    $flcont=fread($fp,filesize($tmpName));
    $flcont=addcslashes($flcont);
    fclose($fp);
  }
  else {
    $fltype="";
    $flcont="";
  }


  $sql="INSERT INTO documents(
      rcid, rcdate, doccate, docid, 
      docdate, doctype, docsubj, doccont, 
      docauth, fltype, flcont) 
      VALUES (
        '$rcid', '$rcdate', '$doccate', '$docid', 
        '$docdate', '$doctype', '$docsubj', '$doccont', 
        '$docauth', '$fltype', '$flcont')";
  require('mysql/connect.php');

  if($result==1) {
    $v1=1;
    $msg="การบันทึกข้อมูลเสร็จสิ้น";
  }
  else {
    $v1=0;
    $msg="การบันทึกข้อมูลผิดพลาด";
  }

  require('mysql/unconn.php');
?>
<script language="javascript">
  var v1=<?php echo($v1); ?>;
  alert('<?php echo($msg); ?>');
  if(v1==1) {
    window.location.replace("doc_detail.php?rcid=<?php echo($rcid); ?>");
  }
  else {
    window.history.back();
  }
</script>

</body>
</html>