<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");

$sql= "SELECT * from  categories where delete_status='0'";
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
<h4>Liste des catégories</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des catégories</a>
</li>
<li class="breadcrumb-item"><a href="">Liste</a>
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
        <a href="addcategory.php"><button class="btn btn-primary pull-right">+ Ajouter une catégorie</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>code</th>
                    <th>Nom du catégorie</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    foreach ($result as $row) {
     
                ?>
                <tr>
                 <td><?php echo $row['id']; ?></td>
                 <td><?php echo $row['name']; ?></td>
                 <td>    
                 <a href="editcategory.php?id=<?= $row['id']; ?>" class="btn btn-info">Update</a>
                <a href="deletecategory.php?id=<?php echo $row['id']?>" onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" /></a>
                </td>
                </tr>
                <?php   
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


</div>
</div>
</div>
</div>
</div>
</div>
<?php include("footer.php"); ?>
