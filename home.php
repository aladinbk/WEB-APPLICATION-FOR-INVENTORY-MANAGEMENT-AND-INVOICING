<?php 
include("check.php");
?>
<?php
include("header.php");
include("connect.php");
$sql="SELECT count(id) as id1 from users where delete_status='0' and status='1'";
$result=$conn->query($sql);
   $row=$result->fetch_assoc();

$sql1="SELECT count(*) c FROM products";
$result1=$conn->query($sql1);
$row1=$result1->fetch_assoc();

$sql2="SELECT count(*) v FROM sales";
$result2=$conn->query($sql2);
$row2=$result2->fetch_assoc();

$sql3="SELECT count(*) a FROM achats";
$result3=$conn->query($sql3);
$row3=$result3->fetch_assoc();


  

?>

<div class="pcoded-content">
<div class="pcoded-inner-content">
<div class="main-body">
<div class="page-wrapper full-calender">
<div class="page-body">
<div class="row">
 <?php if($_SESSION['username']=='alaeddineboubaker@gmail.com'){ ?>
<div class="col-xl-3 col-md-6">
<div class="card bg-c-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row['id1'];?></h4>
<h6 class="text-white m-b-0">Les utilisateurs</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-2" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>
 


 



<div class="col-xl-3 col-md-6">
<div class="card bg-c-lite-green update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row1['c']; ?></h4>
<h6 class="text-white m-b-0">Les produits</h6>
</div>
<div class="col-4 text-right">
<canvas id="update-chart-4" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>



<div class="col-xl-3 col-md-6">
<div class="card bg-c-yellow update-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row2['v']; ?></h4>
<h6 class="text-white m-b-0">Les Ventes</h6>
 </div>
<div class="col-4 text-right">
<canvas id="update-chart-1" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>


<div class="col-xl-3 col-md-6">
<div class="card bg-c-pink order-card">
<div class="card-block">
<div class="row align-items-end">
<div class="col-8">

<h4 class="text-white"><?php echo $row3['a']; ?></h4>
<h6 class="text-white m-b-0">Les achats</h6>
 </div>
<div class="col-4 text-right">
<canvas id="update-chart-1" height="50"></canvas>
</div>
</div>
</div>
</div>
</div>

</div>
<?php } ?>


 
</div>
</div>
</div>
</div>
</div>
<?php
include("footer.php");
?>
