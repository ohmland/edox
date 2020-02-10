<?php
$sql="SELECT rcdate, doccate, docid, docdate,
doctype, docsubj, doccont, docauth, fltype, flcont
FROM 'documents' WHERE rcid='$rcid'";
require('mysql/connect.php');
list($rcdate, $doccate, $docid, $docdate, $doctype,
$docsubj, $doccont, $docauth, $fltype, $flcont)=mysqli_fetch_array($result);
require('mysql/unconn.php');
?>