<html>
<head>
<title>The Blowfish Project</title>
<script type="text/javascript" src="script.js"></script>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<div id="container">

<h1>The Blowfish Project</h1>
<p>Blowfish is a variable-length key, 64-bit block cipher. The algorithm consists of two parts:
a key-expansion part and a data-encryption part. Key expansion converts a key of at most 448 bits
into several subkey arrays totaling 4168 bytes.</p>

<form name="f" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return lastCheck()">

<div class="method">
<input type="radio" value="encrypt" name="theMethod[]" onclick="encrypt()" checked /> Encryption
<input type="radio" value="decrypt" name="theMethod[]" onclick="decrypt()" /> Decryption
</div>

<div class="key">
Please enter your key:<br />
<input type="text" name="theKey" value="Enter key here..." size="48" maxlength="56" onfocus="clearKey(0)" onblur="clearKey(1)" onkeyup="keyMeter()" />
</div>

<div id="strongKey" style="visibility: hidden">
<div id="meter"></div>
<a id="info">TO SHORT</a>
</div>

<div class="method">
<input type="radio" value="block" name="fileOrBlock[]" onclick="typeIn()" checked /> Block of Text
<input type="radio" value="file" name="fileOrBlock[]" onclick="fileIn()" /> File
</div>

<div class="data">

<div id="typeIn">
Please enter your <a id="text">plaintext</a> here:
<textarea name="theInput" cols="58" rows="10" onfocus="document.forms.f.theInput.style.color = 'Black';" onblur="document.forms.f.theInput.style.color = '#7f9db9';"></textarea><br />
</div>

<div id="fileIn" style="display: none;">
Please enter the path to the file:<br />
<input type="text" name="file" value="enter file path here..." size="32" onfocus="clearFile(0)" onblur="clearFile(1)" /><br />
</div>

</div>

<input type="submit" name="submit" value="Encrypt" />
</form>

<?php

if( isset( $_POST[ "submit" ] ) )
{
    include "blowfish.php";

    $method = $_POST[ "theMethod" ][0];
    $source = $_POST[ "fileOrBlock" ][0];
    $key = $_POST[ "theKey" ];

    echo "<div class=\"output\">\n";

    if( $source == "file" )
    {
        $filepath = $_POST[ "file" ];

        if( $filepath == "index.php" || $filepath == "blowfish.php" || $filepath == "speed_test.php" || $filepath == "style.css" || $filepath == "script.js" )
            echo "<b>".$filepath."</b> is a protected operating file and cannot be ".$method."ed.\n";
            
        else if( ( $data = file_get_contents( $filepath ) ) == false )
            echo "<b>Error:</b> Cannot find file.\n";

        else
        {
            $data = blowfish( $key, $data, $method );
            if( file_put_contents( $filepath, $data ) == true )
                echo "<b>".$filepath."</b> has been successfully ".$method."ed.\n";

            else
                echo "<b>".$filepath."</b> has failed to be ".$method."ed.\n";
        }
    }

    else
    {
        $data = $_POST[ "theInput" ];
        $data = blowfish( $key, $data, $method, "cbc" );

        echo "<textarea name=\"theOutput\" cols=\"58\" rows=\"10\" onfocus=\"document.getElementById( 'theOutput' ).style.color = 'Black';\" onblur=\"document.getElementById( 'theOutput' ).style.color = '#7f9db9';\">\n";
        echo $data;
        echo "</textarea>\n";
    }

    echo "<div>";
}

?>

</div>

</body>
</html>