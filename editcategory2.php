<?php
include("connect.php");
//include("editcategory.php");
//$sql="UPDATE categories  set name='".$_POST['name']."' where id ='".$_GET['id']."'";
//$result=$conn->query($sql);


if(isset($_POST['category_update']))
{
    
$cat_edit = $_POST['cat_edit']; 
$name = $_POST['name']; 

$query="UPDATE categories  set name='$name' WHERE id='$cat_edit'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "Categorie modifie avec Success";
    header('location:categories.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
    header('location:categories.php');
    exit(0);
}


}

?>