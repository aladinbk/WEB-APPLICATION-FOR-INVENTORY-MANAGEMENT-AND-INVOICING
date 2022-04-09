<?php
include("check.php");
?>
<?php
include("header.php");
include("connect.php");



//$sql="SELECT * from categories where id='".$_GET['id']."'";
//  $result=$conn->query($sql)->fetch_assoc();
  
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
<h4>التصنيفات</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>التصنيفات</a>
</li>
<li class="breadcrumb-item"><a href="">تعديل تصنيف</a>
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

if(isset($_GET['id']))
{
$cat_id = $_GET['id'];
$editcategory1 ="SELECT * from categories where id='$cat_id' LIMIT 1";
$cat_run = mysqli_query($conn, $editcategory1);

if(mysqli_num_rows($cat_run)>0){
$row = mysqli_fetch_array($cat_run);
?>

 


<form action="editcategory2.php" method="POST">
    <div class="form-group">
    <label>Code</label>
        <input class="form-control col-lg-6" name="cat_edit" value="<?= $row['id']?>">
        <label>Nom du catégorie</label>
        <input class="form-control col-lg-6" name="name" value="<?= $row['name']?>">
        <br>
        <div class="col-lg-12">
       <button type="submit" class="btn btn-success" name="category_update" >تحديث</button>
    </div>
</form>
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

