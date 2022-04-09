<?php
include("connect.php");
$sql="DELETE FROM client WHERE code_clt='".$_GET['code_clt']."'";
header('location:clients.php');
echo 'Deleted successfully.';
if($conn->query($sql))
{
	echo "Record Deleted";
}else
{
	echo "Not Deleted";
}