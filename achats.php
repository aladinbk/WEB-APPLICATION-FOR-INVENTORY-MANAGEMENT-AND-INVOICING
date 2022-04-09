<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");

$sql= "SELECT * from  achats
ORDER BY id DESC";
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
<h4>Tous les achtas</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="home.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Tous les achats</a>
</li>
<li class="breadcrumb-item"><a href="">Tous les achats</a>
</li>
</ul>
</div>
</div>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-header">
    <div class="col-sm-10">
        <a href="acheter.php"><button class="btn btn-primary pull-right">+ Nouvelle achat</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>Code</th>
                    <th>code fourniseur</th>
                    <th>Date d'achat</th>
                    <th>Total</th>
                    <th>Mode de paiement</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if(isset($result))
                {
foreach ($result as $rows) {
    ?>
                <tr class="odd gradeX">
                   <td><?php echo $rows['id']; ?></td>                  
        <td><?php echo $rows['fourniseur_name']; ?></td>
         <td><?php echo $rows['build_date']; ?></td>
          <td><?php echo $rows['total']; ?></td>
        <td><?php echo $rows['remark']; ?></td>
        
        <td>   
          <a href="showfacture2.php?id=<?php echo $rows['id']?>"><input id="show" type="submit" name="show" value="Afficher" class="btn btn-primary" /></a>
          <a href="editachat.php?id=<?php echo $rows['id']?>"><input id="show" type="submit" name="show" value="Update" class="btn btn-warning"/></a>		
          <a href="deletachat.php?id=<?php echo $rows['id']?>" onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Supprimer" class="btn btn-danger" /></a>
          

        </td>
        </tr>
         <?php       
         } 
         }
         ?>      
                
            </tbody>
</table>
</div>
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
