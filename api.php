<?php
	include("connect.php");
	$table = $_GET["tbl"];
	$cols = @$_GET["cols"];
	$val = @$_GET["val"];
	$where = "";
	if(isset($cols)) {
		$cols = explode(',', $cols);
		$where = " where ";
		for($i=0;$i<count($cols);$i++) {
			$c = $cols[$i];
			$where .= " $c like '%$val%'";
			if($i +1 < count($cols)) {
				$where .= " or ";
			}
		}
	}
	$sql = ("SELECT * FROM  $table $where");
	$result = mysqli_query($conn, $sql);
	$arr = array();
	while ($row = mysqli_fetch_assoc($result)){
		$arr[] = $row;
	}
	echo JSON_ENCODE($arr);
?>