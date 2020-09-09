<?php
	include 'connOrder.php';
	$conn1 = OpenCon();
	session_start();
	
	 /**Value is staffid coming from empLoginAction.php**/
	$user_check = $_SESSION['login_user'];
	
	$sql = "SELECT * FROM employee WHERE empid = $user_check";
	
	$result = $conn1->query($sql);
	
	//output data
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$login_id = $row['empid'];
			$login_name = $row['empfname'];
		}
	}
	else{
		header("location:empLogin.php");
		die();
	}
	
	CloseCon($conn1);
?>