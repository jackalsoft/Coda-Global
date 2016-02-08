<?php
	$data=$_POST["result"];
	$title=$_POST["title"];
    $data=json_decode("$data",true);
	$servername = "localhost";
	$username = 'root';
	$password = '';
	$con = new mysqli($servername, $username, $password);
	mysqli_select_db($con,"test");
	$i=0;
	foreach ($data as $key => $val) 
	{
		$result=mysqli_query($con,"select * from LearnHub where category='$val' AND title='$title'");
	
	//$i=0;
	//Now we Will Create HTML(DIV) then we will send it as ajax respose
	
		while($row=mysqli_fetch_array($result))
		{
			$i++;	
		}
	}
	echo ($i);

?>