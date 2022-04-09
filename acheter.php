<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" type="text/css">
<link rel="stylesheet" href="https://popper.js.org" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" type="text/css">
<link rel="stylesheet" href="https://view-source:https://secure.com/" type="text/css">
<link rel="stylesheet" href="https://popper.js.org/" type="text/css">
<link rel="stylesheet" href="http://localhost/saydalina/files/bower_components/bootstrap/js/bootstrap.min.js" type="text/css">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");


?>
<style>
ul#fourniseurList li {
    padding: 2px 6px;
    background: #1b8bf9;
    color: white;
    font-weight: 900;
    font-size: larger;
    cursor: pointer;
}

ul#fourniseurList li:hover {
    padding: 2px 6px;
    background: #0984ffa1;
    color: #ddd;
    font-weight: 900;
    font-size: larger;
}
</style>
<script type="text/javascript">
            function url_redirect(options){
                 var $form = $("<form />");
                 
                 $form.attr("action",options.url);
                 $form.attr("method",options.method);
                 
                 for (var data in options.data)
                 $form.append('<input type="hidden" name="'+data+'" value="'+options.data[data]+'" />');
                  
                 $("body").append($form);
                 $form.submit();
            }
        </script>
<script type="text/javascript">
  window.selectedProducts = [];
  window.calculertot = (code) => {
    // console.log('hhhhh', code)
//	if($('#prod--'+code+'b #quantity--'+code))
//		$('#prod--'+code+'b #total--'+code).val(
//      Number($('#prod--'+code+'b #pu--'+code).val()) * Number($('#prod--'+code+'b #quantity--'+code).val()) - Number($('#prod--'+code+'b #pu--'+code).val()) * Number($('#prod--'+code+'b #quantity--'+code).val()) * Number($('#prod--'+code+'b #remise--'+code).val()/100)
 //     );
    $('#total--'+code).val(
      Number($('#pu--'+code).val()) * Number($('#quantity--'+code).val()) - Number($('#pu--'+code).val()) * Number($('#quantity--'+code).val()) * Number($('#remise--'+code).val()/100)
      );
  };

  window.calculertotale = () => {
    
    tot = 0;
//	let indexx = 0;
    window.selectedProducts.forEach(produit => {

      let code = produit.idTemp;

	  produit.remise = Number($('#remise--'+code).val());
      produit.qtecmd = Number($('#quantity--'+code).val());
      produit.total = Number($('#pu--'+code).val()) * Number($('#quantity--'+code).val());
      tot+=produit.total;
	  
    });
	console.log('hhhhh1', tot);

    $.post('addfourniseurcmd.php', {
      total: tot,
      fourniseur: window.selectedFourniseur.code_fourniseur,
      achat_products : window.selectedProducts,
      idfacture : $("#fact_id").val()
    }).done(function( data ) {
		console.log(data);
      const obj = {
        idFacture: data.data.id,
        dateFacture: data.data.build_date,
        total: tot,
        fourniseur: btoa(JSON.stringify(window.selectedFourniseur)),
        achat_products : btoa(JSON.stringify(window.selectedProducts))
      };
      url_redirect({url: "facture2.php",
                  method: "post",
                  data: obj
                 });
    
  });
    
  };
  window.deleteThis = (code) => {
    let ind = window.selectedProducts.findIndex(el => el.code == code);
    if(ind != -1){
      $( "#prod--"+code).remove();
      window.selectedProducts.splice(ind,1);
    }
  }
  window.addMore = (code) => {
    let ind = window.selectedProducts.findIndex(el => el.code == code);
	console.log(ind);

    let product = window.allProducts.find(el => el.code == code);
    product = JSON.parse(JSON.stringify(product))
	product.idTemp = new Date().getTime();
    window.selectedProducts.push(product);
      $('.mydiv').append(`<div class="form-group row control-group after-add-more subdiv" id="prod--${product.idTemp}">

<div class="col-sm-3">
 <input type="text" class="form-control" readonly value="${product.idTemp} - ${product.designiation}">
 </div>

 <div class="col-sm-2">
 <input type="text" class="form-control" id="quantity--${product.idTemp}" onchange="window.calculertot('${product.idTemp}')" name="quantity[]" placeholder="Quantité" required="">
 </div>
 <div class="col-sm-2">
 <input type="text" class="form-control" id="remise--${product.idTemp}" value="0" onchange="window.calculertot('${product.idTemp}')" name="remise[]">
 </div>

 <div class="col-sm-2">
<input type="text" class="form-control" id="pu--${product.idTemp}" readonly value="${product.Montant_achat}">
 </div>

 <div class="col-sm-2">
 
<input type="text" class="form-control total" id="total--${product.idTemp}" value="0">
 </div>
<label><b>Total</b></label>
 <div class="col-sm-2">
 <button class="btn btn-error" type="button" onclick="window.deleteThis('${product.code}')"><i class="glyphicon glyphicon-plus"></i>Supprimer</button>
 </div>
</div>`);
  }
</script>

<style>
  .hide
  {
    display: none;
  }
</style>
<div class="pcoded-content">
<div class="pcoded-inner-content">

<div class="main-body">
<div class="page-wrapper">

<div class="page-header">
<div class="row align-items-end">
<div class="col-lg-8">
<div class="page-header-title">
<div class="d-inline">
<h4>Ajouter un achat</h4>


</div>
</div>
</div>
<div class="col-lg-4">
<div class="page-header-breadcrumb">
<ul class="breadcrumb-title">
<li class="breadcrumb-item">
<a href=""> <i class="feather icon-home"></i> </a>
</li>
<li class="breadcrumb-item"><a>Gestion des achats</a>
</li>
<li class="breadcrumb-item"><a href="">Ajouter un achat</a>
</li>
</ul>
</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-6" style="display: flex;">
									<label  class="col-sm-6 control-label" style="color:green"><b>Liste de vos fournisserus</b></label>
									<table id=""  class="table table-striped table-bordered nowrap">
<thead>
                <tr class="header">
                    <th style="width:60%;">Code</th>
                    <th style="width:40%;">Nom du fournisseur</th>
                    
  
                    
                </tr>
            </thead>
            <tbody>
           
            <?php
			$limit =5;
			$page = isset($_GET['page']) ? $_GET['page'] : 1;
			$start = ($page -1)* $limit;
           
		    $sql = ("SELECT * FROM  fourniseur LIMIT $start, $limit");
            $result = mysqli_query($conn, $sql);
            $clients = $result->fetch_all(MYSQLI_ASSOC); 
			
			
			$sql1 = ("SELECT count(code_fourniseur) AS code_fourniseur FROM  fourniseur");
            $result1 = mysqli_query($conn, $sql);
            $clientcount= $result1->fetch_all(MYSQLI_ASSOC);
			$totalclt = $clientcount[0]['code_fourniseur'];
			$pages = ceil( $totalclt / $limit );
			$Previous = $page -1;
			$Next = $page +1;
			foreach($clients as $client) :
              ?>
              
        <tr class="odd gradeX"> 
        <td><?php echo $client['code_fourniseur']; ?></td>
         <td><?php echo $client['nom']; ?></td>
       
        </tr>
         <?php       
         endforeach;
         ?>      
                
            </tbody>
</table>

</div>
<div class="col-md-6">
<nav aria-label="Page navigation">
<ul class="pagination">
<li><a href="acheter.php?page=<?= $Previous; ?>" aria-label="Previous">
<span aria-hidden="true">&laquo; Previous</span>
</a></li>
<?php for ($i = 1; $i<= $pages; $i++) : ?>
<li><a href="acheter.php?page=<?= $i; ?>"><?= $i; ?></a></li>
 <?php endfor;?>  
<li><a href="acheter.php?page=<?= $Next; ?>" aria-label="Next">
<span aria-hidden="true">Next &laquo;</span>
</a></li>
</ul>

</nav>
</div>
</div>

<div class="page-body">

<div class="card">
<div class="card-block">
<form class="form-valide" method="POST" name="userform" enctype="multipart/form-data">
 <div class="col-md-12">
 <div class="row">
                                    <div class="col-md-6" style="display: flex;">
                                          <label for="myInput" class="col-sm-6 control-label" style="color:red"><b>Vous devez  Taper le nom du fournisseur:</b></label>
                                          <div class="dropdown">
                                          <div>
                                          <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                          <div class="selectedC">
                                          </div>
                                          </div>
                                          <ul id="fourniseurList">
                                          </ul>
                                        </div>
                                    </div>
									<div class="col-md-6" style="display: flex;">
									<label for="fact_id" class="col-sm-6 control-label"><b>N°facture :</b></label>
									<input type="text" class="form-control" value="" placeholder="Numero de facture" id="fact_id" name="idfacture" />

                                    </div>
                                    </div>
									<br/>
									<br/>
                                   </div>
<br><br><br>								   
<label class="col-sm-6 control-label" style="color:green"><h4>Préparer la facture</h4></label>
<br><br><br>
<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>Code</th>
                    <th>Désigniation</th>
                    
                    <th>Montant achat</th>
                    <th>TVA</th>
                   
                   
                    
                    <th>Actions</th>
                    
                </tr>
            </thead>
            <tbody>
            <script>
            window.allProducts = [];
            </script>
            <?php
            $sql = ("SELECT * FROM  products");
            $result = mysqli_query($conn, $sql);
            
            while ($rows = mysqli_fetch_assoc($result)){
              ?>
              <script>
                window.allProducts.push(<?php echo JSON_ENCODE($rows);?>);
            </script>
        <tr class="odd gradeX"> 
        <td><?php echo $rows['code']; ?></td>
         <td><?php echo $rows['designiation']; ?></td>
        
        <td><?php echo $rows['Montant_achat']; ?></td>
        <td><?php echo $rows['TVA']; ?>%</td>
        
   
        
        
        <td>    
        <button class="btn btn-success" type="button" onclick="window.addMore('<?php echo $rows['code']; ?>')"><i class="glyphicon glyphicon-plus"></i>Ajouter</button>

        </td>
        </tr>
         <?php       
         }
         ?>      
                
            </tbody>
</table>
<br>
<br>
</div>
                                    
                                   </div>
                                   
                                        
                                          <div class="form-group row">

                                           <div class="col-sm-3">
                                                <div class="col-sm-12">
                                                 <b>Nom produit</b> 
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            <b>Quantité</b>
                                            </div>
                                            <div class="col-sm-2">
                                            <b>Remise</b>
                                            </div>
                                            <div class="col-sm-2">
                                           <b>Prix d'achat</b> 
                                            </div>

                                            
                                         </div>
                                         <div class="mydiv">
                                  
                                      </div>

                              
                            
                             <button type="button" onClick="window.calculertotale()" name="btn_save" class="btn btn-primary btn-flat m-b-30 m-t-30">Next</button>
            </form>
            <form name="cmd" id="cmd">


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

<script>
  window.selectFourniseur = (code_fourniseur) => {
    window.selectedFourniseur = window.fourniseurs.find(el => el.code_fourniseur == code_fourniseur);
    $('#fourniseurList').html('');
    $(".selectedC").html(`<h1><span class="badge badge-secondary">${selectedFourniseur.nom}</span></h1>`);
  }
</script>
<script type="text/javascript">
  
$(document).ready(function() {
  $("#myInput").keyup(function(){
    const v = $(this).val();
    $('#fourniseurList').html('');
    window.fourniseurs = window.initialfourniseurs.filter(el => el.nom.toLowerCase().indexOf(String(v).toLowerCase()) != -1 || el.code_fourniseur.indexOf(v) != -1 || el.tel.indexOf(v) != -1);
    window.fourniseurs.forEach(fourniseur => {
      $('#fourniseurList').append(`<li><a id="fourniseur--${fourniseur.code_fourniseur}" onclick="window.selectFourniseur('${fourniseur.code_fourniseur}')">${fourniseur.nom}</a></li>`);
    });
  });

  $.get('api.php?tbl=fourniseur', function(){
    console.log('data,status');
  }).done(function(data){
    window.initialfourniseurs = JSON.parse(data);
    // $('#fourniseurList').html(`<input class="form-control" id="myInput" type="text" placeholder="Search..">`);
    // window.fourniseurs.forEach(fourniseur => {
    //   $('#fourniseurList').append(`<li><a id="fourniseur--${fourniseur.code_fourniseur}" onclick="window.selectFourniseur('${fourniseur.code_fourniseur}')">${fourniseur.nom}</a></li>`);
    // });
  }).fail(function() {
    alert( "Erreur lors du chargement..." );
  });
});
        
</script>

<!--  Autheur Name: Alaeddine Boubaker - https://aladinbk.000webhostapp.com/  -->