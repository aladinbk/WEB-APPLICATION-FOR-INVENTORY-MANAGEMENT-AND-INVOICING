<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

echo "<script>window.facture = ".json_encode($_POST)."</script>";
echo "<script>window.facture.fourniseur = JSON.parse(atob(window.facture.fourniseur))</script>";
echo "<script>window.facture.achat_products = JSON.parse(atob(window.facture.achat_products))</script>";
echo "<script>window.facture.achats = JSON.parse(atob(window.facture.idFacture))</script>";
require "invoice-printFacture.html";

?>