<?php
class PoemView extends BaseView
{
?>
<h1>Looney Limericks</h1>
<div id="wrapper" class="landingPage">
	<div id="poemWrapper">
		<div id="poem">
			<table>
				<tr>
					<th class="PoemTitle">Poem Title</th>
				</tr>
				<tr>
					<td class="PoemContent">Poem Content</td>
				</tr>		
			</table>	
		</div>
	
		<div id="topHighest">
			<b class="highest">Top 10 highest rated poems</b><br>
	
		</div>
	
		<div id="topRecent">
			<b class="highest">Top 10 most recently submitted poems</b><br>
	
		</div>
	</div>
	
	<div id="link-rate">
		<div id="link">
			<a>Choose Random Poem</a>
		
			<a>Upload a poem</a>
		</div>
		
		<div id="rate">
			<img id="1" src="nostar.png" onmouseover="glow(this.id)" onmouseout="hide(this.id)" />
			<img id="2" src="nostar.png" onmouseover="glow(this.id)" onmouseout="hide(this.id)" />
			<img id="3" src="nostar.png" onmouseover="glow(this.id)" onmouseout="hide(this.id)" />
			<img id="4" src="nostar.png" onmouseover="glow(this.id)" onmouseout="hide(this.id)" />
			<img id="5" src="nostar.png" onmouseover="glow(this.id)" onmouseout="hide(this.id)" />
		</div>
	</div>
</div>