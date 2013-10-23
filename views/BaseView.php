<?php
require_once("./controllers/main.php");
abstract class BaseView
{   

    protected $controller;
    function __construct()
    {	    
	    $this->controller = new main();
    }
    
    abstract function displayPoem();
    
    function displayTwoTitleColumn() 
    {
        $result = $this->controller->topTen();
        return $result;
       
    }
    
    function displayLinkRating()
    {
        echo "";
    }
}
?>


