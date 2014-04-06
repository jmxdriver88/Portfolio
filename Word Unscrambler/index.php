<?php

if( isset( $_POST[ "submit" ] ) )
{
    $mode = $_POST[ "mode" ];
    $word = $_POST[ "word" ];

    if( $mode == "unscramble" )
    {
        $wrongChars = " \n\t~!@#$%^&*()_+|}{\":?><`1234567890-=[]\\;',./";

        for( $count = 0; $count < strlen( $wrongChars ); ++$count )
            $word = str_replace( $wrongChars{ $count }, "", $word );

        $word = strtolower( $word );

        $message = "<div class=\"results\">\n<h2>Possible Results:</h2>\n<ul>\n";

        if( $word == "" )
        {
            $message .= "<li id=\"poss0\">No results found</li>\n";
            $resultLength = 1;
        }

        else
        {
            $mSec = microtime(true) * 1000;
			$results = unscramble( $word );
            $mSec = round( ( microtime(true) * 1000 ) - $mSec );

            if( count( $results ) == 0 )
            {
                $message .= "<li id=\"poss0\">No results found</li>\n";
                $resultLength = 1;
            }

            else
            {
                for( $count = 0; $count < count( $results ); ++$count )
                    $message .= "<li id=\"poss".$count."\">".$results[ $count ]."</li>\n";

                $resultLength = count( $results );
            }
        }

        $message .= "</ul>\n<span id=\"time\">File queries took: <b>$mSec</b> milliseconds</span>\n</div>\n";
	}

    else if( $mode == "scramble" )
    {
        $word = strtolower( $word );

        $message = "<div class=\"results\">\n<h2>Possible Results:</h2>\n<ul>\n";

        if( $word == "" )
        {
            $message .= "<li id=\"poss0\">No results found</li>\n";
            $resultLength = 1;
        }

        else if( $word == "enter word here..." )
        {
            $message .= "<li id=\"poss0\">No results found</li>\n";
            $resultLength = 1;
        }

        else
        {
            $message .= "<li id=\"poss0\">".str_shuffle( $word )."</li>\n";
            $resultLength = 1;
        }

        $message .= "</ul>\n</div>\n";
    }

    else
    {
        $message .= "<div class=\"results\">\n<ul>\n<li id=\"poss0\">Unknown Mode: <b>".$mode."</b></li>\n</ul>\n</div>\n";
        $resultLength = 1;
    }
}

function unscramble( $word )
{
    $length = strlen( $word );
	$results = array();

    $sortedWord = alphabetize( $word );
    $trimmedWord = unduplicate( $word );

    foreach( $trimmedWord as $firstLetter )
    {
        $fileName = "wordbank/".$length."/".$firstLetter.".txt";

        $dictionary = file_get_contents( $fileName );
        $dictionary = explode( "\n", $dictionary );

        foreach( $dictionary as $tempWord )
        {
            $tempWord = trim( $tempWord );
            $sortedTemp = alphabetize( $tempWord );

            if( $sortedTemp == $sortedWord )
                $results[] = $tempWord;
        }
    }

    return $results;
}

function alphabetize( $rawWord )
{
    $newWord = str_split( $rawWord );
    sort( $newWord );
    $newWord = implode( $newWord );

    return $newWord;
}

function unduplicate( $rawWord )
{
    $newWord = str_split( $rawWord );
    $newWord = array_unique( $newWord );

    return $newWord;
}

?>
<html>
<head>
<title>Word Unscrambler</title>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body<?php

if( isset( $_POST[ "submit" ] ) )
{
    echo " onload=\"fadeText( ".$resultLength." )\"";
}

?>>

<div id="container">

<div class="intro">
<h1>Word Unscrambler</h1>
<p class="text">This program helps you find possible results for a scrambled word.
It takes a word you enter, sorts it, and checks that sorted version against a dictionary of over 250,000 words. If it finds a word that, when sorted, matches your current sorted one, it reports it as a match. (To scramble a word, check the Scramble radio button).</p>
<p class="text"><noscript style="color: Black;">Note: Please turn JavaScript on in your browser.</noscript></p>
</div>

<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<input type="hidden" name="mode" value="unscramble" readonly="readonly" />

<p class="radios">
<span>
<image src="images/check_z.png" name="check1"
    onmouseover="checkness( 0, 'check1' )"
    onmouseout="checkness( 1, 'check1' )"
    onclick="checkness( 2, 'check1' )" alt="Unscramble" />
<em>Unscramble</em>
</span>
<span>
<image src="images/check.png" name="check2"
    onmouseover="checkness( 0, 'check2' )"
    onmouseout="checkness( 1, 'check2' )"
    onclick="checkness( 2, 'check2' )" alt="Scramble" />
<em>Scramble</em>
</span>
</p>

<input type="text" name="word" class="textform" value="enter word here..."
    onfocus="textform(0)"
    onblur="textform(1)" />
<input type="submit" name="submit" value="Unscramble" class="button"
    onmouseover="document.forms.f.submit.style.background = 'url(images/submit_a.png)';"
    onmouseout="document.forms.f.submit.style.background = 'url(images/submit.png)';"
    onmousedown="document.forms.f.submit.style.background = 'url(images/submit_z.png)';"
    onmouseup="document.forms.f.submit.style.background = 'url(images/submit_a.png)';" />

</form>

<?php

if( isset( $_POST[ "submit" ] ) )
    echo $message;

?>

</div>

</body>
</html>