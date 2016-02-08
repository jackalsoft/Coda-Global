<?php
	$servername = "localhost";
	$username = 'root';
	$password = '';
	$con = new mysqli($servername, $username, $password);
	mysqli_select_db($con,"test");
	$result=mysqli_query($con,"select DISTINCT category from learnhub");
	$data=array();
	$i=0;
	while($row=mysqli_fetch_array($result))
	{
		$data[$i++]=$row['category'];
	}
	echo json_encode($data);


?>