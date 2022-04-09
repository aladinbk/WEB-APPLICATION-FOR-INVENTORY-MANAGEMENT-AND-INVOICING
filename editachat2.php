<?php
include("connect.php");

if(isset($_POST['achat_update']))
{
    
$achat_id = $_POST['achat_id']; 
$total = $_POST['total'];
$remark = $_POST['remark']; 


$query="UPDATE achats SET remark='$remark', total='$total' WHERE id='$achat_id'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "Client modifie avec Success";
    header('location:achats.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
   // header('location:fourniseurs.php');
    exit(0);
}


}

?>