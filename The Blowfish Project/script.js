function encrypt()
{
    document.getElementById( "text" ).innerHTML = "plaintext";
    document.forms.f.submit.value = "Encrypt";
}

function decrypt()
{
    document.getElementById( "text" ).innerHTML = "ciphertext";
    document.forms.f.submit.value = "Decrypt";
}

unaltered = true;

function clearKey( number )
{
    if( number == 0 )
    {
        document.forms.f.theKey.style.color = "Black";
        if( unaltered == true )
        {
            document.forms.f.theKey.value = "";
        }
    }

    else
    {
        document.forms.f.theKey.style.color = "#7f9db9";
        if( document.forms.f.theKey.value == "" )
        {
            document.forms.f.theKey.value = "Enter key here...";
            unaltered = true;
        }

        else
            unaltered = false;
    }
}

altered = true;

function clearFile( number )
{
    if( number == 0 )
    {
        document.forms.f.file.style.color = "Black";
        if( altered == true )
        {
            document.forms.f.file.value = "";
        }
    }

    else
    {
        document.forms.f.file.style.color = "#7f9db9";
        if( document.forms.f.file.value == "" )
        {
            document.forms.f.file.value = "Enter file path here...";
            altered = true;
        }

        else
            altered = false;
    }
}

function fileIn()
{
    document.getElementById( "typeIn" ).style.display = "none";
    document.getElementById( "fileIn" ).style.display = "block";
}

function typeIn()
{
    document.getElementById( "fileIn" ).style.display = "none";
    document.getElementById( "typeIn" ).style.display = "block";
}

function keyMeter()
{
    string = document.forms.f.theKey.value;
    len = string.length;

    check1 = "abcdefghijklmnopqrstuvwxyz";
    check2 = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    check3 = "0123456789";
    check4 = "`~!@#$%^&*()_+-=\\]	[';/.,<>?:\"{}| ";

    score1 = 0;
    score2 = 0;
    score3 = 0;
    score4 = 0;
    score5 = 0;
    finalscore = 0;

    for( i = 0; i < len; ++i )
    {
        character = string.charAt( i );

        if( check1.indexOf( character ) > -1 )
            score1 = 15;

        else if( check2.indexOf( character ) > -1 )
            score2 = 20;

        else if( check3.indexOf( character ) > -1 )
            score3 = 25;

        else if( check4.indexOf( character ) > -1 )
            score4 = 35;

        else
            score5 = 50;
    }

    finalscore = score1 + score2 + score3 + score4 + score5 + len;

    if( len == 0 )
        document.getElementById( "strongKey" ).style.visibility = "hidden";

    else if( len < 4 )
    {
        document.getElementById( "strongKey" ).style.visibility = "visible";
        document.getElementById( "info" ).innerHTML = "TO SHORT";
        document.getElementById( "meter" ).style.width = "4.9em";
        document.getElementById( "meter" ).style.background = "red";
        document.getElementById( "info" ).style.color = "red";
    }

    else if( len >= 4 && len <= 56 )
    {
        document.getElementById( "strongKey" ).style.visibility = "visible";

        if( finalscore < 50 )
        {
            document.getElementById( "info" ).innerHTML = "POOR";
            document.getElementById( "meter" ).style.width = "9.8em";
            document.getElementById( "meter" ).style.background = "#ff9900";
            document.getElementById( "info" ).style.color = "#ff9900";
        }

        else if( finalscore >= 50 && finalscore < 105 )
        {
            document.getElementById( "info" ).innerHTML = "FAIR";
            document.getElementById( "meter" ).style.width = "14.7em";
            document.getElementById( "meter" ).style.background = "#e4e400";
            document.getElementById( "info" ).style.color = "#e4e400";
        }

        else if( finalscore >= 105 && finalscore < 170 )
        {
            document.getElementById( "info" ).innerHTML = "GOOD";
            document.getElementById( "meter" ).style.width = "19.6em";
            document.getElementById( "meter" ).style.background = "Green";
            document.getElementById( "info" ).style.color = "Green";
        }

        else if( finalscore >= 170 )
        {
            document.getElementById( "info" ).innerHTML = "ULTRA GOOD";
            document.getElementById( "meter" ).style.width = "24.5em";
            document.getElementById( "meter" ).style.background = "#0080ff";
            document.getElementById( "info" ).style.color = "#0080ff";
        }
    }

    else
    {
        document.getElementById( "strongKey" ).style.visibility = "visible";
        document.getElementById( "info" ).innerHTML = "TOO LONG";
        document.getElementById( "meter" ).style.width = "24.5em";
        document.getElementById( "meter" ).style.background = "red";
        document.getElementById( "info" ).style.color = "red";
    }
}

function lastCheck()
{
    if( unaltered == true )
    {
        alert( "Please enter a key." );
        return false;
    }

    else if( document.forms.f.theKey.value.length < 4 )
    {
        alert( "Key is too short." );
        return false;
    }
}