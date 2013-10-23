<h1>Submit Poem - <a href=index.php>Looney Limericks</a></h1>

<form id="addNewPoem" name="addPoem" method="POST" action="index.php?c=poem" onSubmit="return doCheck()">
        <input type="hidden" name="ac" value="addPoem">
        Title: <input type="text" name="title" id="title"/><br>
        Author: <input type="text" name="author" id="author"/><br>
        Content: <br>
        <textarea rows="5" cols="50" name="content" id="content"></textarea>
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
        var author = document.getElementById("author");
        var authorLength = author.value.length;
        var content = document.getElementById("content");
        var linesArray = content.split("/n"); //split string by each line and put into array
        
        
        
        /* Null input for title */
        if (titleLength == null || titleLength === "")
        {
            alert("Please enter Title.");
            return false;
        }
        
        /* Title length > 30 */ 
        else if (titleLength != null && titleLength !== "" && titleLength > 30)       
        {
            alert("Title can only contain 30 characters max!");
            return false;
        }
        
        else if (titleLength != null && titleLength !== "" && titleLength <= 30)
        {
            /* Null input for author */
            if (authorLength == null || authorLength === "")
            {
                alert("Please enter Author name.");
                return false;
            }
            
            /* Author length > 30 */
            else if (authorLength != null && authorLength !== "" && authorLength > 30)
            {
                alert("Author name can only contain 30 characters max!");
                return false;
            }
            
            else if (authorLength != null && authorLength !== "" && authorLength <= 30)
            {
                /* Check number of lines */
                var numOfLine = linesArray.length;
                if(numOfLine != 5)
                {
                    alert("Need 5 lines for a poem.");
                    return false;
                }
                else //five lines of poem
                {
                    /* Check length of each line of poem */
                    for (var i = 0; i < 5; i++)
                    {
                        var lineLength = linesArray[i].length;
                        if (lineLength < 30)
                        {
                            alert("Each line can only contain 30 characters.");
                            return false;
                        }
                    }
                }
            }       
        }   
        return true;
    }
</script>