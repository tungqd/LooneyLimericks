<?php
/**
 * This class is used to communicate with the database.
 * @author Loc Dang, Tung Dang, Khanh Nguyen
 *
 */
class Model {
	private $db;
	
	/**
	 * Constructor
	 */
	function __construct() {
		$this->db = @mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE) or die('Could not connect to MySQL: ' . mysqli_connect_error($this->db));
		mysqli_set_charset($this->db, 'uft8');
	}
	
	/**
	 * Gets a random poem from Poem table.
	 * @return an associated array containing id, title, author, content, timeSelected of a poem.
	 */
	function getRandomPoem() {
		$query = "select * from Poem order by rand() limit 1";
		$result = mysqli_query($this->db, $query);
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	
	/**
	 * Gets a poem from Poem table.
	 * @param id the id of the poem
	 * @return an associated array containing id, title, author, content, timeSelected of a poem.
	 */
	function getAPoem($id) {
		$query = "select * from Poem where id = $id";
		$result = mysqli_query($this->db, $query);
		return mysqli_fetch_array($result, MYSQLI_ASSOC);
	}
	
	/**
	 * Get top ten poems with highest ratings
	 * @return an array of associated arrays of top ten poems
	 */
	function getTopTen() {
		$query = "select pID, sum(rating) as sum from Rating group by pID order by sum desc limit 10";
		$result = mysqli_query($this->db, $query);
		//Get the IDs of the top ten in descending order
		$topIDs = array(); 
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$topIDs[] = $row['pID'];
		}
		//Get the titles of the poems
		$poems = array();
		foreach ($topIDs as $index => $value) {
			$poem = $this->getAPoem($value);
			$poems[] = $poem;
		}
		return $poems;
	}
	
	/**
	 * Gets ten most recent poems posted.
	 * @return an array of associated arrays of poems
	 */
	function getTenMostRecent() {
		$query = "select * from Poem order by timeSelected desc limit 10";
		$result = mysqli_query($this->db, $query);
		$poems = array();
		while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
			$poems[] = $row;
		}
		return $poems;
	}
	
	/**
	 * Gets the average rating of a poem
	 * @param id the id of the poem.
	 * @return the average rating.
	 */
	function getAveRating($id) {
		$query = "select average from (select pID, avg(rating) as average from Rating group by pID) R where R.pID = $id";
		$result = mysqli_query($this->db, $query);
		$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
		return $row['average'];
	}
	
	/**
	 * Adds a poem to the Poem table.
	 * @param title the title of the poem 
	 * @param author the author of the poem
	 * @param content the content of the poem
	 */
	function addPoem($title, $author, $content) {
		$query = "insert into Poem (title, author, content, timeSelected) values ('$title', '$author', '$content', NOW())";
		mysqli_query($this->db, $query);
	}
	
	/**
	 * Add a rating to Rating table
	 * @param pID poem ID
	 * @param rating the user rating for this poem
	 */
	function addRating($pID, $rating) {
		$query = "insert into Rating (pID, rating) values ($pID, $rating)";
		mysqli_query($this->db, $query);
	}
}

?>
