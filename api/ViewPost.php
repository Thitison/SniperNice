<?php require_once('connectdb.php'); ?>

<?php

if(isset($_GET['category'])){
	$category = $_GET['category'];
	$sql = "SELECT * FROM post p JOIN users u ON p.user_id = u.id WHERE p.category = '$category'";
	$query = $con->query($sql);
	$response = array("data" => array());
	if($query->num_rows > 0){
		while($result = $query->fetch_assoc()){

			$result['likes'] = getlike($con,$result['post_id']);

			array_push($response["data"], $result);
		}
		echo json_encode($response);
	}else{
		array_push($response,array("response" => "no result"));
		echo json_encode($response);
	}
}else{
	echo "FAILED TO GET DATA";
}

function getlike($con,$postid){
	$sql = "SELECT COUNT(post_id) FROM likebt WHERE post_id = '$postid'";
	$query = $con->query($sql);
	$result = $query->fetch_assoc();
	return $result['COUNT(post_id)'];
}
?>

<?php $con->close(); ?>