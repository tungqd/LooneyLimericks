<?php
class SubmitView extends BaseView
{
?>

<h1>Submit Poem - <a href=index.php><?php echo SITENAME?></a></h1>
<form id="addNewPoem" name="addPoem" method="POST">
        Title: <input type="text" name="title"/><br>
        Author: <input type="text" name="author"/><br>
        Content: <br>
        <textarea rows="4" cols="50" name="content"></textarea>
    	<input type="submit" value="Submit">
</form>
