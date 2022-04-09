<?php
include("connect.php");

if(isset($_POST['fourniseur_update']))
{
    
$fourniseur_id = $_POST['fourniseur_id']; 
$nom = $_POST['nom']; 
$adresse = $_POST['adresse'];
$tel = $_POST['tel'];
$ref_fourniseur = $_POST['ref_fourniseur'];

$query="UPDATE fourniseur SET nom='$nom',adresse='$adresse',tel='$tel',ref_fourniseur='$ref_fourniseur' WHERE code_fourniseur='$fourniseur_id'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "Client modifie avec Success";
    header('location:fourniseurs.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
   // header('location:fourniseurs.php');
    exit(0);
}


}

?>