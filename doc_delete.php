<?php session_start(); ?>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset=utf-8 />
  <title>E-Document</title>
</head>
<body>

<?php
  require('mysql/config.php');
  require('authen_role.php');

  if($authen_role<1){
?>
<script language="javascript">
  alert('กรุณาทำการลงทะเบียนเข้าสู่ระบบ');
  window.location.replace("index.php");
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
    window.location.replace("index.php");
  }
  else {
    window.history.back();
  }
</script>

</body>
</html>