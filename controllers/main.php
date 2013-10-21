<?php
/**
* main.php
*
* Main controller handles retrieveing poem and rating info, add rating
*
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/

class main
{
	
	/**
	*
	* Default constructor
	*/
    function __construct() 
    {
	    require_once('./models/model.php');
    }
    /**
    *
    * Main controller handles retrieving poem info
    */
    function mainController() 
    {
	    $_SESSION["view"] = "LandingView";
    }
    
    function randomPoem() 
    {
	    
    }
    
    function getPoem($id) 
    {
	    
    }
    
    function topTen() 
    {
	    
    }
    
    function tenMostRecent() 
    {
	    
    }
    
    function aveRating($id) 
    {
	    
    }
  
    function addRating($pID, $rating) 
    {
	    
    }
}
?>
