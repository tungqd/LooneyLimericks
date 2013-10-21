<?php
require_once("./views/BaseView.php");
class LandingView extends BaseView
{
	
	
	function displayPoem()
	{
?>
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
<?php
	}
}
?>