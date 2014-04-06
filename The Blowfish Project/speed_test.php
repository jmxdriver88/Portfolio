<html>
<head>
<title>Blowfish Speed Test</title>
</head>

<body>

<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<input type="radio" value="encrypt" name="type[]" checked /> Encryption Mode &nbsp; &nbsp;
<input type="radio" value="decrypt" name="type[]" /> Decryption Mode

<p>
Enter number of bytes to process:<br />
<input type="text" name="length" />
</p>

<input type="submit" name="submit" value="Test Speed" />
</form>

<?php

include "blowfish_f.php";

if( isset( $_POST[ "submit" ] ) )
{
    $mode = $_POST[ "type" ][0];
    $length = (int) $_POST[ "length" ];

    $key = "hFNSXhr3DwrEPSq4Sl5kJQjGm5RvyC6OnI5gJLwb0woy5GIiRXRnjEHg";

    $string = chr( mt_rand( 0, 255 ) );

    for( $count = 0; $count < ( $length - 1 ); ++$count )
    {
        $newString .= $string;
    }

    $timeOne = microtime( true );
    generateSubkeys( $key );
    $newString = blowfish( $newString, $mode );
    $timeTwo = microtime( true );

    $time = $timeTwo - $timeOne;

    $rate = $length / $time; // bytes per second
    echo number_format( $length, 0, "", "," )." bytes have been ".$mode."ed in ".number_format( $time, 3, ".", "," )." seconds.<br />\n";
    echo "This makes for a rate of ".number_format( $rate, 3, ".", "," )." bytes per second.";
}

?>

</body>
</html>