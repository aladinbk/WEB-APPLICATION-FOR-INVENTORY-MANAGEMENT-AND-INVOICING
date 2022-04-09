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
<h4>Fiche Fourniseur </h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="fourniseurs.php">Gestion des fourniseurs</a>
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

if(isset($_GET['code_fourniseur']))
{
$fourniseur_id = $_GET['code_fourniseur'];
$editfour1 ="SELECT * from fourniseur where code_fourniseur='$fourniseur_id' LIMIT 1";
$fourniseur_run = mysqli_query($conn, $editfour1);

if(mysqli_num_rows($fourniseur_run)>0){
$row = mysqli_fetch_array($fourniseur_run);
?>

 

<div class="page-body">

<div class="card">
<div class="card-block">
<form action="editfourniseur2.php" method="POST">

      
      <!-- /.box-header -->
      
            <div class="form-group">
            <label>Code</label>
            <input class="form-control" name="fourniseur_id" value="<?= $row['code_fourniseur']?>" readonly>
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Nom du client</label>
            <input class="form-control" name="nom" value="<?= $row['nom']?>">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Adresse physique</label>
            <input class="form-control" name="adresse" value="<?= $row['adresse']?>">
            </div>

            <!-- /.form-group -->
            <div class="form-group">
            <label>Téléphone</label>
            <input class="form-control" name="tel" value="<?= $row['tel']?>">
            </div>
            <!-- /.form-group -->
         
              <!-- /.form-group -->
              <div class="form-group">
            <label>Matricule</label>
            <input class="form-control" name="ref_fourniseur" value="<?= $row['ref_fourniseur']?>">
            </div>
            <!-- /.form-group -->

      

      
            
      
      
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="fourniseur_update">Update</button>
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

