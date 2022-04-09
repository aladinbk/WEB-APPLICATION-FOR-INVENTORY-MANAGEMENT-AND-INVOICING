<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");
$sql= "SELECT * from  products";
$resultat=$conn->query($sql);
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
<h4>Liste des produits</h4>

</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href="home.php"> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des produits</a>
</li>
<li class="breadcrumb-item"><a href="">Liste des produits</a>
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
        <a href="addproduct.php"><button class="btn btn-primary pull-right">+ Ajouter un produit</button></a>
    </div>

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>Code</th>
                    <th>Désigniation</th>
                    <th>Montant achat</th>
                    <th>Montant venteHT</th>
                    <th>TVA</th>
                    <th>Montant venteTTC</th>

                     
                    
                    
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
            if(empty($resultat))
            {echo"<p>There's nothing in the array.....</p>";}
            
            foreach ($resultat as $row) {
            
            
          
            
              ?>
        <tr class="odd gradeX"> 
        <td><?php echo $row['code']; ?></td>
         <td><?php echo $row['designiation']; ?></td>
		<?php $x= $row['Montant_achat']; ?>
        <td><?php echo $x; ?></td>
		
		<?php $y= $row['Montant_venteHT']; ?>
        <td><?php echo $y; ?></td>
        <td><?php echo $row['TVA']; ?>%</td>
		<?php $z= ($row['Montant_venteHT'])*($row['TVA']/100)+($row['Montant_venteHT']); ?>
        <td><?php echo $z.substr(0,3); ?></td>
        
 
        <td>    
          <a href="editproduct.php?code=<?php echo $row['code']?>"><input id="edit" type="submit" name="edit" value="Modifier" class="btn btn-success" /></a>
          <a href="deleteproduct.php?code=<?php echo $row['code']?>" onclick="return confirm('Are you sure to delete this record?')">  <input id="delete" type="submit" name="delete" value="Supprimer" class="btn btn-danger" /></a>
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