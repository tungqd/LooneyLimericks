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
require_once('./models/model.php');
class main
{
    private $model;
    /**
    *
    * Default constructor
    */
    function __construct()
    {
        $this->model = new model();   
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
       $array = $this->model->getRandomPoem();
       $result = array();
       foreach($array as $name => $value) {
           $result[] = $value;
       }
       return $result;
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
