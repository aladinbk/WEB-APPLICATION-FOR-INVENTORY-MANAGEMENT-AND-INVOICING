<?php
include("connect.php");
$sql="DELETE FROM achats WHERE id='".$_GET['id']."'";
header('location:achats.php');
echo 'Deleted successfully.';
if($conn->query($sql))
{
	echo "Record Deleted";
}else
{
	echo "Not Deleted";
}

