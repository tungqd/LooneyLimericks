function grayOut(id)
{
    document.getElementById(id).src='./css/grayStar.png';
}
/* highlight the stars before current mouse position */
function highlight(id)
{
    document.getElementById(id).src='./css/yellowStar.png';
    if(id==2)
    {
        highlight(1);    
    }
    else if(id==3)
    {
        highlight(1);
        highlight(2);
    }
    else if(id==4)
    {
        highlight(1);
        highlight(2);
        highlight(3);
    }
    else if(id==5)
    {
        highlight(1);
        highlight(2);
        highlight(3);
        highlight(4);
    }
}

/* unhighlight all stars locating after mouse click position */
function unHighLight(id)
{
    if(document.getElementById("rating").innerHTML==1)
    {
        grayOut(2);
        grayOut(3);
        grayOut(4);
        grayOut(5);
    }
    else if(document.getElementById("rating").innerHTML==2)
    {
        grayOut(3);
        grayOut(4);
        grayOut(5);
    }
    else if(document.getElementById("rating").innerHTML==3)
    {
        grayOut(4);
        grayOut(5);
    }
    else if(document.getElementById("rating").innerHTML==4)
    {
        grayOut(5);
    }
    else if(document.getElementById("rating").innerHTML==5)
    {

    }
    else /* no mouse click */
    {
        grayOut(1);
        grayOut(2);
        grayOut(3);
        grayOut(4);
        grayOut(5);
    }
}

/* Display corresponding rate after mouse click and pass rate to controller */
function rate(id)
{
    document.getElementById("rating").innerHTML=id;    
    window.location.href = "index.php?c=main&ac=ratePoem&view=LandingView&pid="+ pid +"&stars="+id;
}


