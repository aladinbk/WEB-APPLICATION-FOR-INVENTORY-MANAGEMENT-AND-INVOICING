<?php
include("connect.php");
$sql="DELETE FROM products WHERE code='".$_GET['code']."'";
header('location:product.php');
echo 'Deleted successfully.';
if($conn->query($sql))
{
	echo "Record Deleted";
}else
{
	echo "Not Deleted";
}
