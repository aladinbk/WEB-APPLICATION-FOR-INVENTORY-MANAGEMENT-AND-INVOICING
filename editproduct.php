<?php
include("check.php");
?>
<?php
include("header.php");
include("connect.php");



//$sql="SELECT * from categories where id='".$_GET['id']."'";
//  $result=$conn->query($sql)->fetch_assoc();
  
?>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Les produits</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des produits</a>
</li>
<li class="breadcrumb-item"><a href="">Modifier le produit</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<?php

if(isset($_GET['code']))
{
$prod_id = $_GET['code'];
$editproduit1 ="SELECT * from products where code='$prod_id' LIMIT 1";
$prod_run = mysqli_query($conn, $editproduit1);

if(mysqli_num_rows($prod_run)>0){
$row = mysqli_fetch_array($prod_run);
?>

 


<form action="editproduit2.php" method="POST">
    <div class="form-group">
        <label>Code</label>
        <input class="form-control col-lg-6" name="prod_edit" value="<?= $row['code']?>" readonly>
        <br>
        <label>Nom du produit</label>
        <input class="form-control col-lg-6" name="designiation" value="<?= $row['designiation']?>">
        <br>
        <label>Montant achat du produit</label>
        <input class="form-control col-lg-6" name="Montant_achat" value="<?= $row['Montant_achat']?>">
        <br>
        <label>Montant de vente du produit hors taxe</label>
        <input class="form-control col-lg-6" name="Montant_venteHT" value="<?= $row['Montant_venteHT']?>">
        <br>
        <label>Taxe sur la valeur ajoutée</label>
        <input class="form-control col-lg-6" name="TVA" value="<?= $row['TVA']?>">
        <br>
        <label>Montant de vente du produit TTC</label>
        <input class="form-control col-lg-6" name="Montant_venteTTC" value="<?= $row['Montant_venteTTC']?>">
        <br>
     
        <label>Remise</label>
        <input class="form-control col-lg-6" name="remise" value="<?= $row['remise']?>">
        <br>
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success" name="produit_update" >Update</button>
    </div>
</form>
<?php
}
else{

  ?>
  <h4>No Records found</h4>
  <?php

}


}



?>
</div>
</div>


</div>

</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>

