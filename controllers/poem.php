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
        
    }
    
    function addAPoem($title, $author, $content)
    {
        addPoem($title, $author, $content);
    }


}
?>
