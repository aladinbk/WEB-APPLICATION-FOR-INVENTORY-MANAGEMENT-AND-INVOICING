<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("header.php");

include("connect.php");



if(isset($_POST['btn']))
{

 // $today = date("Y-m-d h:i:sa");
//echo "Current date and time is ".$today;


  $sql="insert into products(code,designiation,Montant_achat,Montant_venteHT,TVA,Montant_venteTTC,remise)values('".$_POST['code']."','".$_POST['designiation']."','".$_POST['Montant_achat']."','".$_POST['Montant_venteHT']."','".$_POST['TVA']."','".$_POST['Montant_venteTTC']."','".$_POST['remise']."')";
  if($conn->query($sql)==TRUE)
  {
    echo"Record Inserted Sucessfully ";?>
    
    <script>window.location='product.php';
	</script>

	
	
	
  <?php
  }else
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
<h4>Les produits</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="home.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a href="product.php">Gestion des produits</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter un produit</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form  method="POST" enctype="multipart/form-data">

            <div id="page-wrapper">
                <div class="container-fluid">
                   

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                          
                                            <form role="form">
                                              <div class="row">
                                              <div class="col-lg-6">


                                                <div class="form-group">
                                                    <label><b>Code du produit</b></label>
                                                    <input class="form-control" name="code" placeholder="code du produit" required>
                                                    
                                                </div>
                                              </div>
                                                    <div class="col-lg-6">


                                                <div class="form-group">
                                                    <label><b>Nom du produit</b></label>
                                                    <input class="form-control" name="designiation" placeholder="Nom du produit" required>
                                                    
                                                </div>
                                              </div>
                                              <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label><b>Prix d'achat</b></label>
                                                    <input class="form-control"  name="Montant_achat" id="Montant_achat" placeholder="le prix d'achat">
                                                </div>
                                                </div>

                                                <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label><b>Prix VenteHT</b></label>
                                                    <input class="form-control"  name="Montant_venteHT" id="Montant_venteHT"  placeholder="le prix de vente HT" required>
													
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label><b>TVA</b></label>
                                                    <input class="form-control"  name="TVA" placeholder="TVA" required>
                                                </div>
                                                </div>
										
                                                <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label><b>Prix venteTTC</b></label>
                                                    <input class="form-control"  name="Montant_venteTTC" placeholder="le prix de vente TTC" required>
                                                </div>
                                                </div>
                                                
                                                
                                                <div class="col-lg-6">
                                                 <div class="form-group">
                                                    <label><b>Quantite</b></label>
                                                    <input class="form-control"  name="remise" value="1" required>
                                                </div>
                                                </div>                                      
                                                
 
                                                 
                                               <div class="col-lg-12">
                                <div class="form-group">
                                      <center> <button type="submit" class="btn btn-success" name="btn">Ajouter le produit</button></center></div></div>
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
</div>
<?php include("footer.php"); ?>
<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->