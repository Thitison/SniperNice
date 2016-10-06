<?php
date_default_timezone_set('Asia/Bangkok');
require_once('connectdb.php'); ?>

<?php
	if( (isset($_POST['token'])) && (isset($_POST['description'])) && (isset($_POST['category'])) && (isset($_POST['user_id'])) ){
		$token = $_POST['token'];
		$sqlcheckuser = "SELECT COUNT(token),id FROM users WHERE token = '$token'";
		$querycheck = $con->query($sqlcheckuser);
		$checktoken = $querycheck->fetch_assoc();
		if($checktoken['COUNT(token)']){
			if($checktoken['id'] == $_POST['user_id']){
				$description = $_POST['description'];
				$category = $_POST['category'];
				$id = $_POST['user_id'];
				$post = $con->query("INSERT INTO post VALUES('','$description','$category',now(),'$id')");
				if($post){
					echo json_encode(array("response" => "SUCCESS"));
				}else{
					echo json_encode(array("response" => "FAILED"));
				}
			}else
				echo json_encode(array("response" => "FAILED"));
		}else
			echo json_encode(array("response" => "FAILED"));
	}else
		echo json_encode(array("response" => "FAILED"));
	


?>

<?php $con->close(); ?>