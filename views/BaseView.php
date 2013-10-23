<?php 
abstract class BaseView
{   
    function __construct(){}
    
    abstract function displayPoem();
    
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


