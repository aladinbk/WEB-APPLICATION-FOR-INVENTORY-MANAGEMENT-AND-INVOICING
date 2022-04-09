<?php
include("connect.php");

if(isset($_POST['client_update']))
{
    
$client_id = $_POST['client_id']; 
$nom = $_POST['nom']; 
$adresse = $_POST['adresse'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$code_postale = $_POST['code_postale'];
$Fax = $_POST['Fax'];
$pays = $_POST['pays'];
$ville = $_POST['ville'];
$ref_client = $_POST['ref_client'];
$query="UPDATE client  set nom='$nom',adresse='$adresse',email='$email',phone='$phone',code_postale='$code_postale',Fax='$Fax',pays='$pays',ville='$ville',ref_client='$ref_client'  WHERE code_clt='$client_id'";
$query_run = mysqli_query($conn,$query);
if($query_run)
{
    $_SESSION['message'] = "Client modifie avec Success";
    header('location:clients.php');
    exit(0);
} else{
    $_SESSION['message'] = "Error";
    header('location:clients.php');
    exit(0);
}


}

?>