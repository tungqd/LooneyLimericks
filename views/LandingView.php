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

    
    
        
