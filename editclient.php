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
<h4>Fiche client </h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Client</a>
</li>
<li class="breadcrumb-item"><a href="">Modifier le client</a>
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

if(isset($_GET['code_clt']))
{
$client_id = $_GET['code_clt'];
$editclient1 ="SELECT * from client where code_clt='$client_id' LIMIT 1";
$clt_run = mysqli_query($conn, $editclient1);

if(mysqli_num_rows($clt_run)>0){
$row = mysqli_fetch_array($clt_run);
?>

 

<div class="page-body">

<div class="card">
<div class="card-block">
<form action="editclient2.php" method="POST">

      
      <!-- /.box-header -->
      
            <div class="form-group">
            <label>Code</label>
            <input class="form-control" name="client_id" value="<?= $row['code_clt']?>">
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
            <label>E-mail</label>
            <input class="form-control" name="email" value="<?= $row['email']?>">
            </div>
            <!-- /.form-group -->
         
          

      

      
            <div class="form-group">
            <label>Téléphone</label>
            <input class="form-control" name="phone" value="<?= $row['phone']?>">
            </div>

            <!-- /.form-group -->
            <div class="form-group">
            <label>Code postale</label>
            <input class="form-control" name="code_postale" value="<?= $row['code_postale']?>">
            </div>
            <!-- /.form-group -->
          

      
            <div class="form-group">
            <label>Fax</label>
            <input class="form-control" name="Fax" value="<?= $row['Fax']?>">
            </div>

            <!-- /.form-group -->
            <div class="form-group">
            <label>Pays</label>
            <input class="form-control" name="pays" value="<?= $row['pays']?>">
            </div>
            <!-- /.form-group -->
                
            <div class="form-group">
            <label>Ville</label>
            <input class="form-control" name="ville" value="<?= $row['ville']?>">
            </div>
            
            <div class="form-group">
            <label>Matricule</label>
            <input class="form-control" name="ref_client" value="<?= $row['ref_client']?>">
            </div>
      
            
            <div class="form-group">
              <button type="submit" class="btn btn-success" name="client_update">Update</button>
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

