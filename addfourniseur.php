<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("header.php");
include("connect.php");


if(isset($_POST['btn']))
{
  
    $sql="insert into fourniseur(nom,adresse,tel,ref_fourniseur)values('".$_POST['nom']."','".$_POST['adresse']."','".$_POST['tel']."','".$_POST['ref_fourniseur']."')";
  if($conn->query($sql)==TRUE)
  {
    echo"Record Inserted Sucessfully ";?>
    <script>window.location='fourniseurs.php';</script>
  <?php }else
  {
    echo "Something Wrong" . $conn->error;
  }
 
}
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
<h4>Ajouter un Fourniseur</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="fourniseurs.php">Gestion des fournisseurs</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form role="form" method="post">
     <!-- SELECT2 EXAMPLE -->
     <div class="box box-default">
      
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Nom du fournisseur</label>
              <input class="form-control" name="nom" placeholder="Taper le nom du fournisseur">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Adresse physique</label>
            <input class="form-control" name="adresse" placeholder="Taper l'adresse du fournisseur">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
           
            <!-- /.form-group -->
            <div class="form-group">
            <label>Téléphone</label>
            <input class="form-control" name="tel" placeholder="Taper le Num Téléphone">
            </div>
			<div class="form-group">
            <label>Matricule</label>
            <input class="form-control" name="ref_fourniseur" placeholder="Taper la matricule">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
         
          <!-- /.col -->
          <!-- /.col -->
       
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.box-body -->
     
    </div>
    <!-- /.box -->
    
    
    <div class="form-group">
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success" name="btn">Ajouter</button>
    </div>
    </div>
</form>

 
  

    

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

<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->