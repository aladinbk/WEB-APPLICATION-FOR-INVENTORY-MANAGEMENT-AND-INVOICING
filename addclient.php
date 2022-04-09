<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("header.php");
include("connect.php");


if(isset($_POST['btn']))
{
  
    $sql="insert into client(nom,adresse,email,phone,code_postale,Fax,pays,ville,ref_client)values('".$_POST['nom']."','".$_POST['adresse']."','".$_POST['email']."','".$_POST['phone']."','".$_POST['code_postale']."','".$_POST['Fax']."','".$_POST['pays']."','".$_POST['ville']."','".$_POST['ref_client']."')";
  if($conn->query($sql)==TRUE)
  {
    echo"Record Inserted Sucessfully ";?>
    <script>window.location='clients.php';</script>
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
<h4>Ajouter un client</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Tous les clients</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter un client</a>
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
              <label>Nom du client</label>
              <input class="form-control" name="nom" placeholder="Nom">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Adresse physique</label>
            <input class="form-control" name="adresse" placeholder="Adresse physique">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
            <label>E-mail</label>
            <input class="form-control" name="email" placeholder="email">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Téléphone</label>
            <input class="form-control" name="phone" placeholder="Téléphone">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
            <label>Code postale</label>
            <input class="form-control" name="code_postale" placeholder="Code postale">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Fax</label>
            <input class="form-control" name="Fax" placeholder="Fax">
            </div>
            <!-- /.form-group -->
          </div>
          <!-- /.col -->
          <!-- /.col -->
          <div class="col-md-6">
            <div class="form-group">
            <label>Pays</label>
            <input class="form-control" name="pays" placeholder="Pays">
            </div>
            <!-- /.form-group -->
            <div class="form-group">
            <label>Ville</label>
            <input class="form-control" name="ville" placeholder="Ville">
            </div>
			 <div class="form-group">
            <label>Matricule Client</label>
            <input class="form-control" name="ref_client" placeholder="Matricule client">
            </div>
            <!-- /.form-group -->
          </div>
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