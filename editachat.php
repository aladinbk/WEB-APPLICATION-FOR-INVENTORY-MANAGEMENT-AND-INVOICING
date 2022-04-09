<?php
include("check.php");
?>
<?php
include("header.php");
include("connect.php");  
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
<h4>Fiche d'achat </h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="achats.php">Gestion des achats</a>
</li>
<li class="breadcrumb-item"><a href="">Modifier</a>
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

if(isset($_GET['id']))
{
$achat_id = $_GET['id'];
$editfour1 ="SELECT * from achats where id='$achat_id' LIMIT 1";
$fourniseur_run = mysqli_query($conn, $editfour1);

if(mysqli_num_rows($fourniseur_run)>0){
$row = mysqli_fetch_array($fourniseur_run);
?>

 

<div class="page-body">

<div class="card">
<div class="card-block">
<form action="editachat2.php" method="POST">

      
      <!-- /.box-header -->
      
            <div class="form-group">
            <label>Référence</label>
            <input class="form-control" name="achat_id" value="<?= $row['id']?>" readonly>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Date du vente</label>
            <input class="form-control" name="build_date" value="<?= $row['build_date']?>" readonly>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Code fournisseur</label>
            <input class="form-control" name="fourniseur_name" value="<?= $row['fourniseur_name']?>" readonly>
            </div>

            <!-- /.form-group -->
            <div class="form-group">
            <label>Total</label>
            <input class="form-control" name="total" value="<?= $row['total']?>">
            </div>
            <!-- /.form-group -->
         
              <!-- /.form-group -->
              <div class="form-group">
            <label>Mode de paiement</label>
            <input class="form-control" name="remark" value="<?= $row['remark']?>">
            </div>
            <!-- /.form-group -->

      

      
            
      
      
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="achat_update">Update</button>
            </div>  
</form>
</div>
</div>
</div>
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

