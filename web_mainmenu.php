<div>
<?php if($authenrole>0) { ?>
  <a href="index.php?doccate=0">เอกสารเข้า</a>
  <a href="index.php?doccate=1">เอกสารออก</a>
  <a href="javascript:logout();">Log Out</a>
<?php } else { ?>
  <a href="index.php">Log In</a>
<?php } ?>
</div>
<script language="javascript">
	function logout() {
		var url="authen_remove.php";
		var r=confirm("ออกจากระบบ");
		if(r==true) {
			window.location.href=url;
		}
	}
</script>