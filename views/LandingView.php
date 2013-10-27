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
    
    $obj->displayTopTen();
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
            <?php for($i=1; $i<=5; $i++) {
	        ?>
	        <img id="<?php echo $i; ?>" onclick="rate(this.id)" onmouseover="highlight(this.id)" onmouseout="unHighLight(this.id)" src='./views/grayStar.png'/>

        <?php } ?>
            <br>
            <?php
                ob_start();
            ?>
            <div id="rating"></div>
            <?php
                $_SESSION['rate'] = ob_get_contents();
            ?>
            <form id="rate" action="index.php" method="GET">
                <input type="hidden" name="c" value="main" />
                <input type="hidden" name="ac" value="ratePoem" />
                <input type="hidden" name="pid" value=<?php echo $result_array[0];?> />
                <input type="hidden" name="stars" value="<?php echo $_SESSION['rate'];?>" />
            </form>
            <script>
                function grayOut(id)
                {
                    document.getElementById(id).src='./views/grayStar.png';
                }
                /* highlight the stars before current mouse position */
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

                /* unhighlight all stars locating after mouse click position */
                function unHighLight(id)
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
                    else /* no mouse click */
                    {
                        grayOut(1);
                        grayOut(2);
                        grayOut(3);
                        grayOut(4);
                        grayOut(5);
                    }
                }

                /* Display corresponding rate after mouse click and pass rate to controller */
                function rate(id)
                {
                    document.getElementById("rating").innerHTML=id;
                    document.forms["rate"].submit();
                  
                }
            </script>                    
                
            </script> <!-- close Javascript function block -->

        </div> <!-- close div id="rate" -->
        
     
        <div id="link">
            <a href="index.php">Choose Random Poem</a>
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
                <a href="index.php?c=main&view=PoemView&ac=displayTopTen&e=<?php echo $topPoem['ID']; ?>">
                <?php echo $topPoem['title'];?></a><br/>
                <?php } ?>
            </div>
    
            <div id="topRecent">
                <b class="highest">Top 10 most recent</b><br>
                <?php
                    $topRecentArray = $obj->displayTopRecent();
                    foreach ($topRecentArray as $recentPoem) {
                ?>
                <a href="index.php?c=main&view=PoemView&ac=displayTopTen&e=<?php echo $recentPoem['ID']; ?>">
                <?php echo $recentPoem['title'];?></a><br/>
                <?php } ?>
            </div>
    </div> <!-- close div class="right"-->
</div> <!-- close div id="wrapper"-->

    
    
        
