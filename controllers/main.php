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
$data;
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
        global $data;
        if (!isset($_SESSION["rate"]))
        {
	        $_SESSION["rate"] = 0;   
        }
        if (isset($_GET["ac"]) && $_GET["ac"] == "displayPoem")
        {
	        $data = $this->getPoem($_GET["e"]);
	        $_SESSION["view"] = "PoemView";
        }
        else if (isset($_GET["ac"]) && $_GET["ac"] == "chooseRandom")
        {
	        $array = $this->randomPoem();
	        $_SESSION["view"] = "PoemView";
	        
        }
        else if(isset($_GET["ac"]) && $_GET["ac"] == "ratePoem")
        {
            $this->addRating($_GET['pid'], $_GET['stars']);
            $_SESSION["rate"] = $_GET['stars'];       
            $_SESSION["view"] = $_GET["view"];
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
    
    /**
    Get the current featured poem to redisplay it
    */
    function featuredPoem()
    {
    		$array = $this->model->getFeaturedPoem();
       	$result = array();
       	foreach($array as $name => $value) {
           	$result[] = $value;
       	}
       return $result; 
    }

    * Get a poem by calling getAPoem(id) from Model
    * @param id the id of the poem
    * @return an array containing contents of id, title, author, content, timeSelected of a poem.
    */
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
    
    /**
    Send the time when a new featured poem selected back to database
    */
    function sendTimeStamp($id)
    {
    		$this->model->setFeaturedPoemTimeStamp($id);
    }
    
    function isDue()
    {
    		return $this->model->isTenMinuteDue();
    }
}
?>
