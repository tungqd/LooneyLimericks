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
require_once('./models/model.php');
class poem
{
    private $model;
    function __construct()
    {
        $this -> model = new model();
    }
    
    
    function poemController()
    {
        if(isset($_GET["ac"]) && $_GET["ac"] == "uploadPoem") {
	        $_SESSION['view'] = "SubmitView";
        } else if(isset($_POST["ac"]) && $_POST["ac"] == "addPoem"){
            $this -> addAPoem($_POST["title"],$_POST["author"],$_POST["content"]);
	        $_SESSION['view'] = "LandingView";	        
        }
        
    }
    
    function addAPoem($title, $author, $content)
    {
        $this->model->addPoem($title, $author, $content);
    }


}
?>
