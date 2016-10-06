<?php
date_default_timezone_set('Asia/Bangkok');
require_once('connectdb.php'); ?>

<?php
	if( (isset($_POST['token'])) && (isset($_POST['post_id'])) && (isset($_POST['user_id'])) ){
		$token = $_POST['token'];
		$sqlcheckuser = "SELECT COUNT(token),id FROM users WHERE token = '$token'";
		$querycheck = $con->query($sqlcheckuser);
		$checktoken = $querycheck->fetch_assoc();
		if($checktoken['COUNT(token)']){
			if($checktoken['id'] == $_POST['user_id']){
				$postid = $_POST["post_id"];
				$sql = $con->query("SELECT * FROM post WHERE post_id = '$postid'");
				$checkowner = $sql->fetch_assoc();
				if($checkowner["user_id"]==$checktoken["id"]){
					$DeletePost = $con->query(" DELETE FROM post WHERE post_id = '$postid'");
					if($DeletePost){
						echo json_encode(array("response" => "SUCCESS"));
					}else{
						echo json_encode(array("response" => "FAILED"));
					}
				}
			}else
				echo json_encode(array("response" => "FAILED"));
		}else
			echo json_encode(array("response" => "FAILED"));
	}else
		echo json_encode(array("response" => "FAILED"));
	


?>

<?php $con->close(); ?>