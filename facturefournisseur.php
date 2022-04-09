<?php
include("check.php");
?>
<?php
include("connect.php");
include("header.php");


?>
<style>
ul#clientList li {
    padding: 2px 6px;
    background: #1b8bf9;
    color: white;
    font-weight: 900;
    font-size: larger;
    cursor: pointer;
}

ul#clientList li:hover {
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
    $('#total--'+code).val(
      Number($('#pu--'+code).val()) * Number($('#quantity--'+code).val())
      );
  };

  window.calculertotale = () => {
    // console.log('hhhhh', code)
    tot = 0;
    window.selectedProducts.forEach(produit => {
      let code = produit.code;
      produit.qtecmd = Number($('#quantity--'+code).val());
      produit.total = Number($('#pu--'+code).val()) * Number($('#quantity--'+code).val());
      tot+=produit.total;
    });

    $.post('apicmd.php', {
      total: tot,
      client: window.selectedClient.code_fourniseur,
      sales_product : window.selectedProducts
    }).done(function( data ) {
      const obj = {
        idFacture: data.data.id,
        dateFacture: data.data.build_date,
        total: tot,
        client: btoa(JSON.stringify(window.selectedClient)),
        sales_product : btoa(JSON.stringify(window.selectedProducts))
      };
      url_redirect({url: "facture.php",
                  method: "post",
                  data: obj
                 });
      // $.redirect("facture.php",obj, "POST","_blank");

      // $.post('facture.php', obj).done(function( data1 ) {
      //   console.log(data1);
      //   }
      // );
    
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
    if(ind != -1)
      return;
    const product = window.allProducts.find(el => el.code == code);
    window.selectedProducts.push(product);
    // $('.mydiv').html('');
      $('.mydiv').append(`<div class="form-group row control-group after-add-more subdiv" id="prod--${product.code}">

<div class="col-sm-3">
 <input type="text" class="form-control" readonly value="${product.code} - ${product.designiation}">
 </div>

 <div class="col-sm-2">
 <input type="text" class="form-control" id="quantity--${product.code}" onchange="window.calculertot('${product.code}')" name="quantity[]" placeholder="الكمية" required="">
 </div>

 <div class="col-sm-2">
<input type="text" class="form-control" id="pu--${product.code}" readonly value="${product.Montant_venteTTC}">
 </div>

 <div class="col-sm-2">
<input type="text" class="form-control total" id="total--${product.code}" value="0">
 </div>

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
<h4>Ajouter une achat</h4>


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

<div class="page-body">

<div class="card">
<div class="card-block">
<form class="form-valide" method="POST" name="userform" enctype="multipart/form-data">

<div class="table-responsive dt-responsive">
<table id="dom-jqry" class="table table-striped table-bordered nowrap">
<thead>
                <tr>
                    <th>Code</th>
                    <th>Désigniation</th>
                    
                    <th>Montant achatHT</th>
                    <th>TVA</th>
                    <th>Montant achatTTC</th>
                     <th>Quantite</th>
                    <th>Remise</th>
                    
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
        
        <td><?php echo $rows['Montant_venteHT']; ?>DT</td>
        <td><?php echo $rows['TVA']; ?>%</td>
        <td><?php echo $rows['Montant_venteTTC']; ?>DT</td>
        <td><?php echo $rows['Quantite']; ?></td>
        <td><?php echo $rows['remise']; ?></td>
        
        
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
                                                 Nom produit 
                                                </div>
                                        </div>

                                            <div class="col-sm-2">
                                            Quantité
                                            </div>

                                            <div class="col-sm-2">
                                           Prix de achat 
                                            </div>

                                            
                                         </div>
                                         <div class="mydiv">
                                  
                                      </div>

                              
                             <div class="col-sm-6">
                                    <div class="form-group row">
                                          <label class="col-sm-6 control-label">Choisir un client</label>
                                          <div class="dropdown">
                                          <div>
                                          <input class="form-control" id="myInput" type="text" placeholder="Search..">
                                          <div class="selectedC">
                                          </div>
                                          </div>
                                          <ul id="clientList">
                                          </ul>
                                        </div>
                                    </div>
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
  window.selectClient = (code_fourniseur) => {
    window.selectedClient = window.clients.find(el => el.code_fourniseur == code_fourniseur);
    $('#clientList').html('');
    $(".selectedC").html(`<h1><span class="badge badge-secondary">${selectedClient.nom}</span></h1>`);
  }
</script>
<script type="text/javascript">
  
$(document).ready(function() {
  $("#myInput").keyup(function(){
    const v = $(this).val();
    $('#clientList').html('');
    window.clients = window.initialclients.filter(el => el.nom.toLowerCase().indexOf(String(v).toLowerCase()) != -1 || el.code_fourniseur.indexOf(v) != -1 || el.tel.indexOf(v) != -1);
    window.clients.forEach(clt => {
      $('#clientList').append(`<li><a id="clt--${clt.code_fourniseur}" onclick="window.selectClient('${clt.code_fourniseur}')">${clt.nom}</a></li>`);
    });
  });

  $.get('api.php?tbl=fourniseur', function(){
    console.log('data,status');
  }).done(function(data){
    window.initialclients = JSON.parse(data);
    // $('#clientList').html(`<input class="form-control" id="myInput" type="text" placeholder="Search..">`);
    // window.clients.forEach(clt => {
    //   $('#clientList').append(`<li><a id="clt--${clt.code_clt}" onclick="window.selectClient('${clt.code_clt}')">${clt.nom}</a></li>`);
    // });
  }).fail(function() {
    alert( "Erreur lors du chargement..." );
  });
});
        
</script>