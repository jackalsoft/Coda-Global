<?php
	$data=$_POST["result"];
    $data=json_decode("$data",true);
	$servername = "localhost";
	$username = 'root';
	$password = '';
	$con = new mysqli($servername, $username, $password);
	mysqli_select_db($con,"test");
	$html="<div>";

	foreach ($data as $key => $val) 
	{
		$result=mysqli_query($con,"select * from LearnHub where category='$val' order by rating DESC");
	
	//$i=0;
	//Now we Will Create HTML(DIV) then we will send it as ajax respose
	
		while($row=mysqli_fetch_array($result))
		{
			$rating_image=$row['rating']."jpg";
		
		//here we create html for every selected row.
			$html=$html."<div class='forde' class='".$row['category']."''>"; /*here i splitted every row with div to make removal process easier during unchecking the textbox*/
			$html=$html."<img src='".$row['image']."' class='im' width='150' height='172'><div class='tit'>".$row['title']."</div><span class='beg'>".$row['type']."<span><p>".$row['description']."<p><span>".
			"<img src='".$row['rating'].".png' width='70' height='20'>"."<span><a href='".$row['url']."'>"."extlink<a>"."<span> Price ".$row['price']."<span><hr>";
			$html=$html."<div>";
		}
	}
	$html=$html."<div>";
	echo ($html);

?>