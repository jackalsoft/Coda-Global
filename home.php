<html>
<title>Hacker Earth</title>
<head>
	<link href='https://fonts.googleapis.com/css?family=Oswald:700' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Noto+Serif' rel='stylesheet' type='text/css'>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function()
		{
			//var x="";
			$.ajax(
			{
	    		type: 'POST',
    			url: 'getcat.php',
            	cache: false,
            	dataType: "json",
    			success: function(result) 
    			{

        			var i=0;
        			while(result[i])
        			{
        				var string="<input style='float:left;' type='checkbox' name='"+result[i]+"'value='"+result[i]+"'>"+result[i]+"<br>";
        				$(".append").append(string); //it will dynamically add categoreys by fetching categerey from database\
        				i++;
        				//alert(string);
        			}
    			}
			});
			$("input:radio").change(function()
			{
				if(this.value=="rate")
				{
					$(".resul").empty();
				 var checkednames = [];
				 $('input:checked').each(function() 
				 {
            		checkednames.push(this.value);
        		});
				 
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'addlistrate.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						$(".resul").append(res); //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'Count.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						document.getElementById("num").innerHTML=res; //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
				}
				else
				{
					$(".resul").empty();
				 var checkednames = [];
				 $('input:checked').each(function() 
				 {
            		checkednames.push(this.value);
        		});
				 
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'addlistmoney.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						$(".resul").append(res); //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'Count.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						document.getElementById("num").innerHTML=res; //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
					
				}
			});
			$(document).on("change","input:checkbox",function()
			{
				 
				 $(".resul").empty();
				 var checkednames = [];
				 $('input:checked').each(function() 
				 {
            		checkednames.push(this.value);
        		});
				 
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'addlist.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						$(".resul").append(res); //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'Count.php',
    					data:  {result:JSON.stringify(checkednames)},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						document.getElementById("num").innerHTML=res; //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
				 /*
				if(this.checked)
				{
					var str="";
					str=str+"cate"+"="+$(this).attr('value');
					$.ajax(
					{
	    				type: 'POST',
    					url: 'addlist.php',
    					data: str,
            			cache: false,
            			dataType: "json",
    					success: function(result) 
    					{
    						$(".resul").append(result); //it will append the response from the ajax to the resul class thus it list the courses
    					}	
					});
				}*/
				/*if(!(this.checked))
				{
					var str="'.";
					str=str+$(this).attr('value')+"'";
					$(str).remove();
				}*/
			});
			$(".sear").click(function()
			{
				/* ----------Solution(algorithm)---------
					1.First we will get title.
					2.next we will make an array which will consist of all checkedbox values
					3.then we will do ajax request
					4. in ajax request we will do simple query to filter the result after we create html using the result.
					5.finally ajax send you the response.
					6.we will append the html in specific div.
				*/ 
				$(".resul").empty();
				var val=$(".Search_Val").val();//get the title
				var checkednames = [];
				 $('input:checked').each(function() 
				 {
            		checkednames.push(this.value);
        		});
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'addlistwithfilter.php',
    					data:  {result:JSON.stringify(checkednames),title:val},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{
    						$(".resul").append(res); //it will append the response from the ajax to the resul class thus it list the courses
    					}	
					});
				 $.ajax(
					{
	    				type: 'POST',
    					url: 'CountE.php',
    					data:  {result:JSON.stringify(checkednames),title:val},
            			cache: false,
            			dataType: "html",
    					success: function(res) 
    					{

    						document.getElementById("num").innerHTML=res; //it will append the response from the ajax to the resul class thus it list the courses
    						//var x=$(".resul").height()+100;
    						//alert(x);
    						//$(".inner").css("height",x);

    					}	
					});
			});


		});
	</script>
	<style type="text/css">
		body
		{
			
			background-repeat: repeat-y;
			background-size: 100%;
			margin-top: -2px;
			background: rgba(50,50,50,0.7);
			margin-left: -1px;
			
		}
		.top
		{
			width: 100%;
			background: -webkit-repeating-linear-gradient(-45deg,rgba(100,100,100,1),rgba(200,200,200,0.5) 10px);
			position: fixed;

			height: 80px;
			z-index: 1;
		}
		.Cen
		{
			width:800px;
			min-height: 700px;
			position: relative;
			margin: 0 auto;
			border:1px solid rgba(0,0,0,0);
			
		}
		.box
		{
			margin-top: 6em;
			background: -webkit-linear-gradient(top,rgba(200,200,200,0.5),rgba(20,20,20,0.5));
			box-shadow: 0 0 5px 1px;
			border:2px solid rgba(250,250,250,0.2);
			text-align: center;
			color: white;
			font-family: 'Noto Serif', serif;
			width: 100%;
		}
		.inner
		{
			background: -webkit-linear-gradient(top,rgba(20,20,20,0.5),rgba(200,200,170,0.7));
			border:2px solid rgba(250,250,250,0.2);
			min-height: 600px;
			overflow:auto;
			width: 100%;
		}
		select,input
		{
			font-family: 'Fjalla One', sans-serif;
			color: black;
		}
		.fon
		{
			font-family: 'Fjalla One', sans-serif;
			
			color: white;
			box-shadow: 0 0 5px 2px yellow;
			border-radius: 2px;
		}
		.efon
		{
			font-family: 'Fjalla One', sans-serif;
			
			color: white;
		}
		.gobu
		{
			width:60px;
			height:30px;
			margin: 0 auto;
			box-shadow: 0 0 5px 2px pink;
			color: white;
			font-family: 'Fjalla One', sans-serif;
			background: -webkit-linear-gradient(top,rgba(250,250,250,1),rgba(40,40,40,0.7));
		}
		.gobu:hover
		{
			background: -webkit-linear-gradient(top,rgba(40,40,40,0.7),rgba(250,250,250,1));
			cursor: pointer;
		}
		.divleft
		{
			float:left;
			width: 35%;
			border: 2px solid white;
			min-height: 10px;
		}
		.divright
		{
			float:right;
			width: 64%;
			min-height: 90%;
			
		}
		.resul
		{
			width: 100%;
			min-height: 90%;
			overflow:auto
		}
		.forde
		{
			font-family: 'Fjalla One', sans-serif;
			background: -webkit-linear-gradient(top,rgba(20,20,20,0.5),rgba(200,200,170,0.7));
			border:2px solid rgba(250,250,250,1);
		}
		.im
		{
			float:left;
		}
		.tit
		{
			font-weight: bold;
			border:2px solid rgba(250,150,250,1);
			width: 99%;
		}
		.beg
		{
			width:250px;
			margin-top: 1em;
			background-color: rgb(120,120,120);
		}
	</style>
</head>
	<body>

		<div class="top">
			<p style="text-align:center;font-size:25px;margin-top:20px;font-family:'Oswald', sans-serif;color:white;">I Love Coding</p>
		</div>
		<div class="Cen">
			<div class="box">
				<div class="inner">
					
					<div class="divleft">
						<div>
							<p class="fon" >Categorey</p>
							<div class="append"></div>
							<div>
								<span class="efon">Total Courses: </span><span id="num">0</span> 
							</div>
							<div>
								<p class="fon">Sort By:(Category Wise) </p>
								<input type="radio" value="rate" name="sort">Rating<br>
								<input type="radio" value="sort" name="sort">Pricing
							</div>
						</div>
					</div>	
					<div class="divright">
						<div class="search">
							<input type="text" class="Search_Val" placeholder="Search (by Title)">
							<input type="button" class="sear" value="Search">
						</div>
						<div class="resul">

						</div>
					</div>				
				</div>
				</div>
			</div>
		</div>
	</body>
</html>