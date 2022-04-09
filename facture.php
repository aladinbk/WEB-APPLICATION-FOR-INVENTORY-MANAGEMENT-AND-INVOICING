<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

echo "<script>window.facture = ".json_encode($_POST)."</script>";
echo "<script>window.facture.client = JSON.parse(atob(window.facture.client))</script>";
echo "<script>window.facture.sales_product = JSON.parse(atob(window.facture.sales_product))</script>";

require "invoice-print.html";

?>