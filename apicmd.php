<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
include("connect.php");
// echo $_POST["total"];
if(isset($_POST["total"]) && isset($_POST["sales_product"]) && isset($_POST["client"])){
    extract($_POST);
    $sqlCmd = "INSERT INTO sales (customer_name,total) values ('$client', $total)";
    $result = mysqli_query($conn, $sqlCmd);
    $cmdId = mysqli_insert_id($conn);
    $sqlSaleProduct = "INSERT INTO sales_product (sales_id, code, quantity, unit_price, total) values ";
    foreach ($sales_product as $value){
        $sqlSaleProduct .= " ($cmdId, '".$value['code']."', ".$value['qtecmd'].", ".$value['Montant_venteHT'].", ".$value['total']." ),";
    }
    $sqlSaleProduct = substr($sqlSaleProduct, 0, -1);
    // echo $sqlSaleProduct;
    $result = mysqli_query($conn, $sqlSaleProduct);


    $sql = ("SELECT * FROM sales where id=$cmdId");
	$result = mysqli_query($conn, $sql);
	$data = array();
	while ($row = mysqli_fetch_assoc($result)){
		$data = $row;
	}
    $arr = array();
    $arr['status'] = 200;
    $arr['data'] = $data;
    echo json_encode($arr);
}
?>