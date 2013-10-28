<!-- Pass poemID, $_SESSION["rate"] to javascript variable -->
<script type="text/javascript">
var pid = '<?php echo $result_array[0]; ?>';
var selectedStars ='<?php echo $_SESSION["rate"]; ?>';
</script>
<script src="./views/stars.js"></script>
<?php
require_once("./views/BaseView.php");
class LandingView extends BaseView
{
    
    function __construct()
    {
        parent::__construct();
    }
    
    function displayPoem()
    {
        $result = $this->controller->randomPoem();
        if($result)
       		 $this->controller->sendTimeStamp();
        return $result;
    }
}

    $obj = new LandingView();
?>

<h1><a href="index.php"><?php echo SITENAME; ?></a></h1>
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
                        <td class="PoemContent"><b>Content:</b><br/><?php 
	                        $content_array = explode("\n",$result_array[3]);
	                        foreach ($content_array as $line) {
	                            echo $line."<br/>";
	                        }
                        ?>
                        </td>
                    </tr>   
                </table>    
        </div> <!-- close poem div -->
            <br/><br/><br/><br/><br/><br/>
        <div id="rate"> Your Rating:
            <?php 
                for($j=1; $j<=$_SESSION["rate"]; $j++) {
	        ?>
	        <img id="<?php echo $j; ?>" onclick="rate(<?php echo $j; ?>)" onmouseover="highlight(<?php echo $j; ?>)" onmouseout="unHighLight(<?php echo $j; ?>)" src='./css/yellowStar.png'/>
	        <?php 
	            } 
		        for($i=$_SESSION["rate"]+1; $i<=5; $i++) {
	        ?>
	        <img id="<?php echo $i; ?>" onclick="rate(<?php echo $i; ?>)" onmouseover="highlight(<?php echo $i; ?>)" onmouseout="unHighLight(<?php echo $i; ?>)" src='./css/grayStar.png'/>
        <?php } ?>
            <br/>         
            <div id="rating"></div>
                    </div> <!-- close div id="rate" -->
        
            <div id="link">
            <a href="index.php?c=main&view=PoemView&ac=chooseRandom">Choose Random Poem</a>
            <br/>
            <a href="index.php?c=poem&view=SubmitView&ac=uploadPoem">Upload a poem</a>
        </div>
    </div><!-- close div id="poemWrapper" -->  
    
    <div class="right">
            <div id="topHighest">
                <b class="highest">Top 10 highest rating</b><br>
                <?php
                    $topTenArray = $obj->displayTopTen();
                    foreach ($topTenArray as $topPoem) {
                ?>
                <a href="index.php?c=main&view=PoemView&ac=displayPoem&e=<?php echo $topPoem['ID']; ?>">
                <?php echo $topPoem['title'];?></a><br/>
                <?php } ?>
            </div>
    
            <div id="topRecent">
                <b class="highest">Top 10 most recent</b><br>
                <?php
                    $topRecentArray = $obj->displayTopRecent();
                    foreach ($topRecentArray as $recentPoem) {
                ?>
                <a href="index.php?c=main&view=PoemView&ac=displayPoem&e=<?php echo $recentPoem['ID']; ?>">
                <?php echo $recentPoem['title'];?></a><br/>
                <?php } ?>
            </div>
    </div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->

    
    
        
