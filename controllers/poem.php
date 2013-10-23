<?php
/**
* poem.php
*
* 
* Poem controller handles adding poem
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/

class poem
{
    
    function __construct()
    {
        require_once('./models/model.php');    
    }
    
    
    function poemController()
    {
        if(isset($_GET["ac"]) && $_GET["ac"] == "uploadPoem")
        $_SESSION['view'] = "SubmitView";
    }
    
    function addAPoem($title, $author, $content)
    {
        addPoem($title, $author, $content);
    }


}
?>
