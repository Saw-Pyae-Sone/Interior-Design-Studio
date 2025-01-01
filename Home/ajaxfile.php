<?php 

include "../admin/connection.php";

$request = 0;

if(isset($_POST['request'])){
	$request = $_POST['request'];
}

if($request == 1){
	$Cid = $_POST['Cid'];

	$sel = "SELECT * FROM SubCategory WHERE Category_ID = '$Cid' ORDER BY SubC_Name";
    $cget = mysqli_query($con,$sel);

    $response = array();
    while ($fetch = mysqli_fetch_assoc($cget)) 
    {
    	$response[] = array(
			"id" => $fetch['SubC_ID'],
			"name" => $fetch['SubC_Name']
		);
    }

	echo json_encode($response);
	exit;
}