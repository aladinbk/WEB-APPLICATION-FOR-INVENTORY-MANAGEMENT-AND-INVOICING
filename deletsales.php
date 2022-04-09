<?php
include("connect.php");
$sql="DELETE FROM sales WHERE id='".$_GET['id']."'";
header('location:sales.php');
echo 'Deleted successfully.';
if($conn->query($sql))
{
	echo "Record Deleted";
}else
{
	echo "Not Deleted";
}

