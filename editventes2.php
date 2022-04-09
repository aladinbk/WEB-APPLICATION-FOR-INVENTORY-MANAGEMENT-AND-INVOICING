<?php
include("connect.php");

if(isset($_POST['vente_update']))
{
    
$vente_id = $_POST['vente_id']; 
$remark = $_POST['remark'];
$total = $_POST['total'];


$query="UPDATE sales SET remark='$remark', total='$total' WHERE id='$vente_id'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "Client modifie avec Success";
    header('location:sales.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
   // header('location:fourniseurs.php');
    exit(0);
}


}

?>