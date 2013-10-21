<?php
/**
* index.php
*
* This file acts as entry point and calls appropriate controllers.
*
* @author   Tung Dang, Loc Dang, Khanh Nguyen
*
*
*/
session_start();
class looneyLimericks
{

    /**
    * Constructor
    */
	function __construct()
	{
		require_once('./config/config.php');
	}
	/**
	* Calls appropriate controllers
	*/
	function start()
	{
	    // there are 2 controllers
		$controllers_available= array('main','poem');

		//deciding the controller to be run
		if(isset($_GET['c']) && in_array($_GET['c'],$controllers_available)){
			if("main"==$_GET['c']){
				$controller = "main";
				}
				else {
					$controller = $_GET['c'];
				}
			}
			else{
				$controller = "main";
			}

			//function pointer to call the controller
			$this -> $controller();
	}	
    /**
    * main controller
    */
	function main()
	{
		require_once("./controllers/main.php");
		$main = new main();
		$main -> mainController();
		$this -> displayView($_SESSION['view']);
	}
	/**
    * poem controller
    */
	function poem()
	{
		require_once("./controllers/poem.php");
		$poem = new Poem();
		$poen -> loginController();
		$this -> displayView($_SESSION['view']);
	}
	
	/**
	*
	* displayView renders and displays specific view
	*/
	function displayView($viewname)
	{
	?>
	<!DOCTYPE html  PUBLIC "-//W3C//DTD XHTML 1.1//EN"
	"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">

	<html xmlns="http://www.w3.org/1999/xhtml" >
		<head>
			<title>Looney Limericks</title>
			<meta name="Authors" content="Tung Dang, Loc Dang, Khanh Nguyen" />
			<meta name="description" content="A showcase site for especially entertaining limericks" />
			<meta name="keywords" content="HW2, blog, MVC" />
			<meta charset="utf-8" />
			<meta name="ROBOTS" content="NOINDEX, NOFOLLOW"/>
			<link rel="stylesheet" type="text/css" href="./css/styles.css" />
		</head>
		<body>
			<?php 	
				require_once("./views/{$viewname}.php"); 
			?>
		</body>
	</html>
	<?php
		}
}
$looney = new looneyLimericks();
$looney -> start();	
?>

