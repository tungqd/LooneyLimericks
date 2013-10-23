<h1>Submit Poem - <a href=index.php><?php echo SITENAME?></a></h1>
<form id="addNewPoem" name="addPoem" method="POST" onSubmit="JavaScript:doCheck()">
        Title: <input type="text" name="title" id="title"/><br>
        Author: <input type="text" name="author" id="author"/><br>
        Content: <br>
        <textarea rows="1" cols="50" name="content" id="1"></textarea>
        <textarea rows="1" cols="50" name="content" id="2"></textarea>
        <textarea rows="1" cols="50" name="content" id="3"></textarea>
        <textarea rows="1" cols="50" name="content" id="4"></textarea>
        <textarea rows="1" cols="50" name="content" id="5"></textarea>
        <input type="submit" value="Submit"/>
</form>


<script type="text/javascript">
/**
* Javascript function to validate input when submitting new poem
* Max lengths for title and author are 30 characters.
* Max length for each line of poem is 30 characters.
* A poem needs exactly 5 lines.
*/
    function doCheck()
    {
        var title=document.getElementById("title");
        var titleLength = title.value.length;
        var author=document.getElementById("author");
        var authorLength = author.value.length;
        
        var validate;
        if (titleLength > 30)
        {
            validate = false;
            break;
        }
        else if (titleLength <= 30 && authorLength > 30)
        {
            validate = false;
            break
        }   
        else if (titleLength <= 30 && authorLength <= 30)
        {
            /* Check length of each line of poem */
            for (var i = 1; i < 5; i++)
            {
                var poemLine = document.getElementById(i);
                var lineLength = poemLine.value.length;
                if (lineLength < 30)
                    {
                        validate = false;
                        break;
                    }
            }
        }
        validate = true;
        
        /* Valid input - Send data to server */
        if (validate)
        {
        
        }
        else 
        {
            alert("Title and Author name can only contain 30 characters. Poem can only contain 150.");       
        }
    }
</script>