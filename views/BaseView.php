<?php 
class BaseView
{	
	function displayPoem()
	{
		echo "displayPoem";
	
	}
	
	function displayTwoTitleColumn() 
	{
		echo "displayTwoTitleColumn";
	}
	
	function displayLinkRating()
	{
		echo "displayLinkRating";
	}
}
?>

<h1>Looney Limericks</h1>
	<div id="wrapper" class="landingPage">

		<div id="poemWrapper">
  
	
			<div id="topHighest">
				<b class="highest">Top 10 highest rated poems</b><br>
				<!-- fake link -->
				<a>Title 1</a>
				
			</div>
	
			<div id="topRecent">
				<b class="highest">Top 10 most recently submitted poems</b><br>
				<!-- fake link -->
				<a>Title 1</a>
			</div>

		</div> <!-- close div id="poemWrapper"-->


	<div id="link-rate">
	
		<div id="link">
			<a>Choose Random Poem</a>
		
			<a>Upload a poem</a>
		</div>
		
		<div id="rate"> 
			<img id="1" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src="grayStar.png" />
			<img id="2" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src="grayStar.png" />
			<img id="3" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src="grayStar.png" />
			<img id="4" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src="grayStar.png" />
			<img id="5" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src="grayStar.png" />
			
			<script>
				function highlight(id)
				{
					document.getElementById(id).src="yellowStar.png";
					if(id==2)
					{
						highlight(1);
					}
					else if(id==3)
					{
						highlight(1);
						highlight(2);
					}
					else if(id==4)
					{
						highlight(1);
						highlight(2);
						highlight(3);
					}
					else if(id==5)
					{
						highlight(1);
						highlight(2);
						highlight(3);
						highlight(4);
					}
				}

				function clear(id)
				{
					if(document.getElementById("rating").innerHTML==1)
					{
						grayOut(2);
						grayOut(3);
						grayOut(4);
						grayOut(5);
					}
					else if(document.getElementById("rating").innerHTML==2)
					{
						grayOut(3);
						grayOut(4);
						grayOut(5);
					}
					else if(document.getElementById("rating").innerHTML==3)
					{
						grayOut(4);
						grayOut(5);
					}
					else if(document.getElementById("rating").innerHTML==4)
					{
						grayOut(5);
					}
					else if(document.getElementById("rating").innerHTML==5)
					{
					}
					else
					{
						grayOut(1);
						grayOut(2);
						grayOut(3);
						grayOut(4);
						grayOut(5);
					}
				}

				function rate(id)
				{
					document.getElementById("rating").innerHTML=id;
				}
				
				function grayOut(id)
				{
					document.getElementById(id).src="grayStar.png";
				}
			</script> <!-- close Javascript function block -->
		</div> <!-- close div id="rate" -->
	</div> <!-- close div id="link-rate" --> 

	</div> <!-- close div id="wrapper" -->
	
	
<?php
	$obj = new BaseView(); 
	$obj->displayTwoTitleColumn();
	$obj->displayLinkRating();
?>
