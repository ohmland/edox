<?php
if(isset($_GET['doccate'])) {
  $doccate = $_GET['doccate'];
}
else {
	$doccate = 0;
}
$sql = "SELECT rcid, rcdate, doccate, docid, docdate,
doctype, docsubj, docauth
FROM documents WHERE '$doccate'";

if(isset($_GET['keyword'])) {
  $keyword = $_GET['keyword'];
}
else {
	$keyword = "";
}

if(isset($_GET['stdate'])) {
  $stdate = $_GET['stdate'];
}
else {
	$stdate = "";
}

if(isset($_GET['endate'])) {
  $endate = $_GET['endate'];
}
else {
	$endate = "";
}

if($keyword != "" && $stdate != "" && $endate != "") {
	$sql.=" AND (rcid = '$keyword'
	 OR docid = '$keyword' OR docsubj LIKE '%$keyword%')
	 AND (docdate BETWEEN '$stdate' AND '$endate')";
}
elseif($keyword != "") {
	$sql.=" AND (rcid = '$keyword'
	 OR docid = '$keyword' OR docsubj LIKE '%$keyword%')";
}
elseif($stdate != "" && $endate != "") {
	$sql.=" AND (docdate BETWEEN '$stdate' AND '$endate')";
}
else {
	$nowdate = date("Y-m-d");
	$sql.= " AND (doccate BETWEEN '$nowdate' AND '$nowdate')";
}

$sql.= " ORDER BY rcdate DESC, rcid DESC";
?>

<h3><?php echo($arrdoccate[$doccate]); ?></h3><hr />
<form action="index.php" method="get" name="search_Form" target="_self">
	<input name="doccate" type="hidden" value="<?php echo($doccate); ?>">
	ค้นหา : <input name="keyword" type="text" value="<?php echo($keyword); ?>"><br />
	วันที่ : <input name="stdate" type="date" value="<?php echo($stdate); ?>"><br />
	ถึง : <input name="endate" type="date" value="<?php echo($endate); ?>"><br />
	<input name="submit" type="submit" value="ค้นหา">
	<a href="doc_form.php">บันทึกเอกสารใหม่</a>
	
</form><br />

<?php require('mysql/connect.php'); ?>

<table border="1" cellspacing="0" cellpadding="2">
	<tr style="background-color:#6FF;">
		<td>จัดการ</td>
		<td>เลขที่บันทึก</td>
		<td>วันที่บันทึก</td>
		<td>หมวดหนังสือ</td>
		<td>เลขที่หนังสือ</td>
		<td>วันที่ออก</td>
		<td>ชนิดหนังสือ</td>
		<td>เรื่อง</td>
		<td>ผู้ออก</td>
	</tr>
	<?php while($record=mysqli_fetch_array($result)) { ?>
		<tr style="background-color:#6FF;">
		<td>
			<a herf="doc_detail.php?rcid=<?php echo($record[0]); ?>">ดูข้อมูล</a>
			<a herf="doc_form.php?rcid=<?php echo($record[0]); ?>">แก้ไข</a>
			<a href="javascript:rmdoc('<?php echo($record[0]); ?>');">ลบ</a>
		</td>
		<td><?php echo($record[0]); ?></td>
		<td><?php echo date_format(date_create($record[1]),"d/m/Y"); ?></td>
		<td><?php echo($arrdoccate[$record[2]]); ?></td>
		<td><?php echo($record[3]); ?></td>
		<td><?php echo date_format(date_create($record[4]),"d/m/Y"); ?></td>
		<td><?php echo($arrdoccate[$record[5]]); ?></td>
		<td><?php echo($record[6]); ?></td>
		<td><?php echo($record[7]); ?></td>
	</tr>
	<?php } ?>
</table>
<?php require('mysql/unconn.php'); ?>
<script language="javascript">
	function rmdoc(v1) {
		var url="doc_delete.php?rcid=" + v1;
		var r=confirm("ยืนยันการลบข้อมูล");
		if(r==true) {
			window.location.href=url;
		}
	}
</script>

