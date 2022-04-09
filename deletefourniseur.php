<?php
include("connect.php");
$sql="DELETE FROM fourniseur WHERE code_fourniseur='".$_GET['code_fourniseur']."'";
header('location:fourniseurs.php');
echo 'Deleted successfully.';
if($conn->query($sql))
{
	echo "Record Deleted";
}else
{
	echo "Not Deleted";
}