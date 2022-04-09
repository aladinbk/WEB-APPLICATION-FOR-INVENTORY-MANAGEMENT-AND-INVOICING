<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("connect.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){
     $sql="INSERT INTO user_groups set group_name='".$_POST['group_name']."',group_level='".$_POST['group_level']."',group_status='".$_POST['group_status']."' ";
    $result1=$conn->query($sql);
    header('location:group.php');
}
include("header.php");

$sql= "SELECT * from  user_groups where delete_status='0'";
$result=$conn->query($sql);
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
<h4>Ajouter un groupe</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Les Groupes</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter un groupe</a>
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

                                                   <div class="row">
                                                   
                                                 <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Nom du groupe</label>
                                                    <input class="form-control"name="group_name" placeholder="Taper le nom du groupe" required>
                                                    </div>
                                                    <div class="form-group">
                                                    <label for="level" class="control-label">Niveau du groupe</label>
                                                     <input type="number" class="form-control" name=" group_level">
                                                 </div>
                                            
                                            
                                                
                                                <div class="form-group">
                                                    <label>Status du groupe</label>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="group_status"  value="1" checked>Actif
                                                        </label>
                                                    </div>
                                                    <div class="radio">
                                                        <label>
                                                            <input type="radio" name="group_status"  value="0">Passif
                                                        </label>
                                                    
                                                </div>
                                                </div>
                                                </div> 
                                                 <div class="col-lg-12">
                                   <center>   <div class="form-group">
                                         <button type="submit" class="btn btn-success" name="btn">Création</button></center>
                                        </div></div>
                                                           
                                           </div>
                                           </form> 
</div>
</div>


</div>

</div>
</div>

<div id="#">
</div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>

<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->