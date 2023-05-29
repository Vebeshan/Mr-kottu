<?php
include_once("connection.php");
if($_REQUEST['empid']) {
	$sql = "SELECT Product_ID , Product_Name , Type, Price,image FROM products WHERE status='1' AND Product_ID='".$_REQUEST['empid']."'";
	$resultSet = mysqli_query($conn, $sql);	
	$empData = array();
	while( $emp = mysqli_fetch_assoc($resultSet) ) {
		$empData = $emp;
	}
	echo json_encode($empData);
} else {
	echo 0;	
}
?>
