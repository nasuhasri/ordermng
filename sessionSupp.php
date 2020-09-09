<?php
	include 'connOrder.php';
	$conn1 = OpenCon();
	session_start();
	
	 /**Value suppID coming from empLoginAction.php**/
	$suppID = $_SESSION['login_supplier'];
	
	$sql = "SELECT * FROM supplier WHERE supplierid = $suppID";
	
	$result = $conn1->query($sql);
	
	//output data
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$login_id = $row['supplierid'];
			$login_name = $row['suppliername'];
		}
	}
	else{
		header("location:suppLogin.php");
		die();
	}
	
	CloseCon($conn1);
?>