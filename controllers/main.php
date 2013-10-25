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
        if (isset($_GET["ac"]) && $_GET["ac"] == "displayTopTen") {
	        $array = $this->getPoem($_GET["i"]);
	        $_SESSION["view"] = "PoemView";
	        
        }
        else if(isset($_GET["ac"]) && $_GET["ac"] == "ratePoem"){
            echo "rating is added";
            $this->addRating($_GET['pid'], $_GET['stars']);
            $_SESSION["view"] = "LandingView";
        } else {
        $_SESSION["view"] = "LandingView";
        }
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
       $array = $this->model->getAPoem($id);
       $result = array();
       foreach($array as $name => $value) {
           $result[] = $value;
       }
       return $result;
    }
    
    function topTen()
    {
       $array = $this->model->getTopTen();
       $result = array();
       foreach($array as $name => $value) {
           //truncate array, return only ID and title
           $value = array_slice($value,0,2);
           $result[] = $value;
       }
       return $result;
        
    }
    
    function topMostRecent()
    {
       
       $array = $this->model->getTenMostRecent();
       $result = array();
       foreach($array as $name => $value) {
           //truncate array, return only ID and title
           $value = array_slice($value,0,2);
           $result[] = $value;
       }
       return $result;
    }
    
    function aveRating($id)
    {
       $rating = getAveRating($id); 
    }
  
    function addRating($pID, $rating)
    {
        $this->model->addRating($pID,$rating);
    }
}
?>
