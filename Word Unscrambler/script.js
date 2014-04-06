var check1on = true;
var check2on = false;

function checkness( number, image )
{
    if( image == "check1" )
    {
        if( number == 0 )
        {
            if( check1on == false )
                document.images.check1.src = "images/check_a.png";
        }

        else if( number == 1 )
        {
            if( check1on == false )
                document.images.check1.src = "images/check.png";
        }

        else
        {
            document.images.check1.src = "images/check_z.png";
            document.images.check2.src = "images/check.png";
            document.forms.f.submit.value = "Unscramble";
            document.forms.f.mode.value = "unscramble";
            check1on = true;
            check2on = false;
        }
    }

    else if( image == "check2" )
    {
        if( number == 0 )
        {
            if( check2on == false )
                document.images.check2.src = "images/check_a.png";
        }

        else if( number == 1 )
        {
            if( check2on == false )
                document.images.check2.src = "images/check.png";
        }

        else
        {
            document.images.check2.src = "images/check_z.png";
            document.images.check1.src = "images/check.png";
            document.forms.f.submit.value = "Scramble";
            document.forms.f.mode.value = "scramble";
            check2on = true;
            check1on = false;
        }
    }

    else
        alert( "Unknown image: " + image );
}

unaltered = true;

function textform( number )
{
    if( number == 0 )
    {
        document.forms.f.word.style.color = "Black";
        if( unaltered == true )
        {
            document.forms.f.word.value = "";
        }
    }

    else
    {
        document.forms.f.word.style.color = "Gray";
        if( document.forms.f.word.value == "" )
        {
            document.forms.f.word.value = "enter word here...";
            unaltered = true;
        }

        else
            unaltered = false;
    }
}

var hexaColor = 255;
var pause = 1;

function fadeText( number )
{
    for( var count = 0; count < number; ++count )
        document.getElementById( "poss" + count ).style.color = "White";

    fadeNext( number, 0 );
}

function fadeNext( number, count )
{
    // If color is not black yet
    if( hexaColor > 0 )
    {
        hexaColor -= 5; // increase color darkness
        document.getElementById( "poss" + count ).style.color = "rgb( "+hexaColor+", "+hexaColor+", "+hexaColor+" )";

        var nextFunction = function(){ fadeNext( number, count ); };
        timeout = setTimeout( nextFunction, pause );
    }

    else
    {
        hexaColor = 255; // reset hex value

        ++count; 
        if( count < number )
            fadeNext( number, ( count ) );
    }
}