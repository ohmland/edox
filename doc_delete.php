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

  if(isset($_GET['rcid'])) {
    $rcid=$_GET['rcid'];
  }
  else {
    $rcid="";
  }

  $sql="SELECT doccate FROM documents WHERE rcid='$rcid'";
  require('mysql/connect.php');
  $record=mysqli_fetch_array($result);
  $doccate=(int)$record[0];
  require('mysql/unconn.php');

  $sql="DELETE FROM documents WHERE rcid='$rcid'";
  require('mysql/connect.php');

  if($result==1) {
    $v1=1;
    $msg="การลบข้อมูลเสร็จสิ้น";
  }
  else {
    $v1=0;
    $msg="การลบข้อมูลผิดพลาด";
  }

  require('mysql/unconn.php');
?>
<script language="javascript">
  var v1=<?php echo($v1); ?>;
  alert('<?php echo($msg); ?>');
  if(v1==1) {
    window.location.replace("index.php?$doccate=<?php echo($doccate); ?>");
  }
  else {
    window.history.back();
  }
</script>

</body>
</html>