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
    
    function displayTopTen() 
    {
        $result = $this->controller->topTen();
        return $result;
       
    }
    function displayTopRecent()
    {
	    $result = $this->controller->topMostRecent();
	    return $result;
    }
    function displayStars($pid)
    {
        $result = $this->controller->aveRating($pid);
	    return $result;
    }
   
}
?>


