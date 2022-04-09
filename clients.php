<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");

$sql= "SELECT * from  client";
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
<h4>Liste des clients</h4>
</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="home.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des clients</a>
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
        <a href="addclient.php"><button class="btn btn-primary pull-right">+ Ajouter un client</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>code</th>
                    <th>Nom</th>
                    <th>Adresse physique</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Code Postale</th>
                    <th>Fax</th>
                    <th>Pays</th>
                    <th>Ville</th>
                    <th>Matricule</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    foreach ($result as $row) {
     
                ?>
                <tr>
                 <td><?php echo $row['code_clt']; ?></td>
                 <td><?php echo $row['nom']; ?></td>
                 <td><?php echo $row['adresse']; ?></td>
                 <td><?php echo $row['email']; ?></td>
                 <td><?php echo $row['phone']; ?></td>
                 <td><?php echo $row['code_postale']; ?></td>
                 <td><?php echo $row['Fax']; ?></td>
                 <td><?php echo $row['pays']; ?></td>
                 <td><?php echo $row['ville']; ?></td>
                 <td><?php echo $row['ref_client']; ?></td>
                 <td>    
                 <a href="editclient.php?code_clt=<?= $row['code_clt']; ?>" class="btn btn-info">Update</a>
                <a href="deleteclient.php?code_clt=<?php echo $row['code_clt']?>" onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Delete" class="btn btn-danger" /></a>
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
