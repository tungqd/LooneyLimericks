<?php
require_once("./views/BaseView.php");
require_once("./controllers/main.php");


class LandingView extends BaseView
{
	private $controller;
	function __construct()
	{
		$this->controller = new main();
	}
	
	function displayPoem()
	{
		$result = $this->controller->randomPoem();
		return $result;
	}
}

	$obj = new LandingView(); 
	
	$obj->displayTwoTitleColumn();
	$obj->displayLinkRating();
?>

<h1>Looney Limericks</h1>
<div id="wrapper" class="landingPage">

	<div id="poemWrapper">
			<div id="poem">
				<table>
					<tr>
						<th class="PoemTitle">Title:
							<?php 
								 $result_array = $obj->displayPoem();
								 echo $result_array[1];
							?>
						</th>
					</tr>
					<tr>
						<td class="PoemAuthor"><b>Author:</b><?php echo $result_array[2];?></td>
					</tr>	
					<tr>
						<td class="PoemContent"><b>Content:</b><?php echo $result_array[3];?></td>
					</tr>	
				</table>	
			</div>
			<br/><br/><br/><br/><br/><br/>
		<div id="rate"> Your Rating:
			<img id="1" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src='./views/grayStar.png' />
			<img id="2" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src='./views/grayStar.png' />
			<img id="3" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src='./views/grayStar.png' />
			<img id="4" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src='./views/grayStar.png' />
			<img id="5" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="clear(this.id)" src='./views/grayStar.png' />
			
			<script>
				function highlight(id)
				{
					document.getElementById(id).src='./views/yellowStar.png';
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
					document.getElementById(id).src='./views/grayStar.png';
				}
			</script> <!-- close Javascript function block -->
		</div> <!-- close div id="rate" -->
		<div id="link">
			<a>Choose Random Poem</a>
		    <br/>
			<a>Upload a poem</a>
			</div>
	</div><!-- close div id="poemWrapper" -->
	<div class="right">
			<div id="topHighest">
				<b class="highest">Top 10</b><br>
				<!-- fake link -->
				<a>Title 1</a>
				
			</div>
	
			<div id="topRecent">
				<b class="highest">Top 10 most recent</b><br>
				<!-- fake link -->
				<a>Title 1</a>
			</div>
	</div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->

	
	
		
