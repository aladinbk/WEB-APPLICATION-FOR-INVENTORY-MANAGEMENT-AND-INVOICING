<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");

$sql= "SELECT * from  sales where build_date='".date('Y-m-d')."' ORDER BY id DESC";
$result = mysqli_query($conn, $sql);


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
<h4>Ventes du jour</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Rapport des ventes</a>
</li>
<li class="breadcrumb-item"><a href="">Ventes du jour</a>
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
       
    </div>  

</div>
<div class="card-block">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>#</th>
                    <th>Code client</th>
                    <th>Date du jour</th>
                    <th>Total</th>
                    <th>Remarque</th>
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
        <td><?php echo $rows['customer_name']; ?></td>
         <td><?php echo $rows['build_date']; ?></td>
          <td><?php echo $rows['total']; ?></td>
        <td><?php echo $rows['remark']; ?></td>
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