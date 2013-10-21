<?php
/**
* main.php
*
* Main controller handles retrieveing poem and rating info, adding rating
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
	   return getRandomPoem();
    }
    
    function getPoem($id)
    {
	   return getAPoem($id);
    }
    
    function topTen()
    {
	    $array = getTopTen();
    }
    
    function tenMostRecent()
    {
	    $array = getTenMostRecent();
    }
    
    function aveRating($id)
    {
	   $rating = getAveRating($id); 
    }
  
    function addRating($pID, $rating)
    {
	    addRating($pID,$rating);
    }
}
?>
