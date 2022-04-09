<?php
include("connect.php");

if(isset($_POST['produit_update']))
{
    
$prod_edit = $_POST['prod_edit']; 
$designiation = $_POST['designiation']; 
$Montant_achat = $_POST['Montant_achat']; 
$Montant_venteHT = $_POST['Montant_venteHT']; 
$TVA = $_POST['TVA']; 
$Montant_venteTTC = $_POST['Montant_venteTTC']; 

$remise = $_POST['remise'];
$query="UPDATE products  set designiation='$designiation',  Montant_achat='$Montant_achat', Montant_venteHT='$Montant_venteHT', TVA='$TVA', Montant_venteTTC='$Montant_venteTTC',  remise='$remise' WHERE code='$prod_edit'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "produit modifie avec Success";
    header('location:product.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
    header('location:product.php');
    exit(0);
}


}

?>