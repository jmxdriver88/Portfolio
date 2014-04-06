<?php

$root = "projects";

if( isset( $_GET['path'] ) )
    $path = $_GET['path'];

else
    header( "Location: index.php" );

$name = explode( "/", $path );
$name = $name[ count( $name ) - 1 ];

?>
<html>
<head>
<title><?php echo "Driver Basic Script: ".$name; ?></title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script language="JavaScript">

function find_os()
{
    if( navigator.userAgent.indexOf('IRIX') != -1 )
        var system = "Irix";

    else if( ( navigator.userAgent.indexOf('Win') != -1 ) && (navigator.userAgent.indexOf('95') != -1 ) )
        var system = "Windows 95";

    else if( navigator.userAgent.indexOf('Win') != -1 )
        var system = "Windows NT";

    else if( navigator.userAgent.indexOf('Mac') != -1 )
        var system = "Macintosh";

    else
        var system = navigator.userAgent;

    return( system );
}

</script>
</head>

<body>

<?php

$scriptfile = file( $path ) or die( "Couldn't open script!" );

for( $count = 0; $count < count( $scriptfile ); ++$count )
{
    $line = $scriptfile[ $count ];
    $line = str_replace( "
", "", $line );

    if( $line == "" )
        continue;

    $command = explode( " ", $line );
    $command = strtolower( $command[0] );

    $suffix = substr( $line, ( strlen( $command ) + 1 ) );


    switch( $command )
    {
        case "write":
            if( $suffix{0} == "!" )
            {
                $string_name = substr_replace( $suffix, "", 0, 1 );
                if( !isset( $VARIABLES[ $string_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot write a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error2\">See Manual</a></p>\n";
                    break;
                }
                else
                    $suffix = $VARIABLES[ $string_name ];
            }

            echo $suffix."<br />\n";
            break;








        case "variable":
            $breakpoint = "";
            $var_name = "";
            $var_content = "";

            for( $count_v = 0; $count_v < strlen( $suffix ); ++$count_v )
            {
                if( $suffix{ $count_v } == " " )
                {
                    $breakpoint = $count_v + 1;
                    break;
                }

                else
                    $var_name .= $suffix{ $count_v };
            }

            if( isset( $breakpoint ) )
                $var_content = substr( $suffix, $breakpoint );

            if( strstr( $var_name, "$" ) )
            {
                echo "<p class=\"error\"><b>Error: </b>Variable name is not allowed to contain a <b>$</b> on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error3\">See Manual</a></p>\n";
                break;
            }

            if( $var_name == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Variable needs a name on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error4\">See Manual</a></p>\n";
                break;
            }

            if( $var_content == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Variable needs some content on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error5\">See Manual</a></p>\n";
                break;
            }

            if( $var_content{0} == "!" )
            {
                $var_content = substr_replace( $var_content, "", 0, 1 );
                $VARIABLES[ $var_name ] = $var_content;
                settype( $VARIABLES[ $var_name ], "string" );
            }

            else
            {
                $VARIABLES[ $var_name ] = $var_content;
                settype( $VARIABLES[ $var_name ], "float" );
            }

            break;








        case "add":
            $breakpoint = "";
            $firstnum = "";
            $secondnum = "";

            for( $count_a = 0; $count_a < strlen( $suffix ); ++$count_a )
            {
                if( $suffix{ $count_a } == " " )
                {
                    $breakpoint = $count_a + 1;
                    break;
                }

                else
                    $firstnum .= $suffix{ $count_a };
            }

            if( isset( $breakpoint ) )
                $secondnum = substr( $suffix, $breakpoint );

            if( $firstnum[0] == "!" )
            {
                $num_name = substr_replace( $firstnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform addition with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $firstnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum[0] == "!" )
            {
                $num_name = substr_replace( $secondnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform addition with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $secondnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Addition command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Addition command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            settype( $firstnum, "float" );
            settype( $secondnum, "float" );

            $result = $firstnum + $secondnum;
            echo $result."<br />\n";

            break;









        case "subtract":
            $breakpoint = "";
            $firstnum = "";
            $secondnum = "";

            for( $count_s = 0; $count_s < strlen( $suffix ); ++$count_s )
            {
                if( $suffix{ $count_s } == " " )
                {
                    $breakpoint = $count_s + 1;
                    break;
                }

                else
                    $firstnum .= $suffix{ $count_s };
            }

            if( isset( $breakpoint ) )
                $secondnum = substr( $suffix, $breakpoint );

            if( $firstnum[0] == "!" )
            {
                $num_name = substr_replace( $firstnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform subtraction with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $firstnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum[0] == "!" )
            {
                $num_name = substr_replace( $secondnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform subtraction with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $secondnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Subtraction command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Subtraction command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            settype( $firstnum, "float" );
            settype( $secondnum, "float" );

            $result = $firstnum - $secondnum;
            echo $result."<br />\n";

            break;








        case "multiply":
            $breakpoint = "";
            $firstnum = "";
            $secondnum = "";

            for( $count_m = 0; $count_m < strlen( $suffix ); ++$count_m )
            {
                if( $suffix{ $count_m } == " " )
                {
                    $breakpoint = $count_m + 1;
                    break;
                }

                else
                    $firstnum .= $suffix{ $count_m };
            }

            if( isset( $breakpoint ) )
                $secondnum = substr( $suffix, $breakpoint );

            if( $firstnum[0] == "!" )
            {
                $num_name = substr_replace( $firstnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform multiplication with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $firstnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum[0] == "!" )
            {
                $num_name = substr_replace( $secondnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform multiplication with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $secondnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Multiplication command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Multiplication command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            settype( $firstnum, "float" );
            settype( $secondnum, "float" );

            $result = $firstnum * $secondnum;
            echo $result."<br />\n";

            break;









        case "divide":
            $breakpoint = "";
            $firstnum = "";
            $secondnum = "";

            for( $count_d = 0; $count_d < strlen( $suffix ); ++$count_d )
            {
                if( $suffix{ $count_d } == " " )
                {
                    $breakpoint = $count_d + 1;
                    break;
                }

                else
                    $firstnum .= $suffix{ $count_d };
            }

            if( isset( $breakpoint ) )
                $secondnum = substr( $suffix, $breakpoint );

            if( $firstnum[0] == "!" )
            {
                $num_name = substr_replace( $firstnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform division with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $firstnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum[0] == "!" )
            {
                $num_name = substr_replace( $secondnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot preform division with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error6\">See Manual</a></p>\n";
                    break;
                }

                else
                    $secondnum = $VARIABLES[ $num_name ];
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Division command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            if( $secondnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Division command requires two numbers on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error7\">See Manual</a></p>\n";
                break;
            }

            settype( $firstnum, "float" );
            settype( $secondnum, "float" );

            $result = $firstnum / $secondnum;
            echo $result."<br />\n";

            break;








        case "squareroot":
            $firstnum = $suffix;

            if( $firstnum == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Squareroot command requires a number on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error8\">See Manual</a></p>\n";
                break;
            }

            if( $firstnum[0] == "!" )
            {
                $num_name = substr_replace( $firstnum, "", 0, 1 );

                if( !isset( $VARIABLES[ $num_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot find the square root of a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error9\">See Manual</a></p>\n";
                    break;
                }

                else
                    $firstnum = $VARIABLES[ $num_name ];
            }

            settype( $firstnum, "float" );

            $result = sqrt( $firstnum );
            echo $result."<br />\n";

            break;









        case "concat":
            if( $suffix == "" )
            {
                echo "<p class=\"error\"><b>Error: </b>Cannot concat an empty string on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error10\">See Manual</a></p>\n";
                break;
            }

            $print = true;
            $strings = explode( ".*.", $suffix );

            for( $count_c = 0; $count_c < count( $strings ); ++$count_c )
            {
                if( $strings[$count_c]{0} == "!" )
                {
                    $string_name = substr_replace( $strings[$count_c], "", 0, 1 );

                    if( !isset( $VARIABLES[ $string_name ] ) )
                    {
                        echo "<p class=\"error\"><b>Error: </b>Cannot concat with a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error11\">See Manual</a></p>\n";
                        $print = false;
                        break;
                    }

                    else
                        $strings[$count_c] = $VARIABLES[ $string_name ];
                }
            }

            foreach( $strings as $partial )
                $final .= $partial;

            if( $print )
                echo $final."<br />\n";

            break;








        case "reverse":
            if( $suffix{0} == "!" )
            {
                $string_name = substr_replace( $suffix, "", 0, 1 );
                if( !isset( $VARIABLES[ $string_name ] ) )
                {
                    echo "<p class=\"error\"><b>Error: </b>Cannot reverse a variable that doesn't exist on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error12\">See Manual</a></p>\n";
                    break;
                }
                else
                    $suffix = $VARIABLES[ $string_name ];
            }

            echo strrev( $suffix )."<br />\n";
            break;






        case "date":
            echo date( "l, F j, Y, g:i:s A" )."<br />\n";
            break;



        case "timestamp":
            echo time()."<br />\n";
            break;



        case "year":
            echo date( "Y" )."<br />\n";
            break;



        case "month":
            echo date( "F" )."<br />\n";
            break;



        case "day":
            echo date( "j" )."<br />\n";
            break;



        case "dayofweek":
            echo date( "l" )."<br />\n";
            break;



        case "hour":
            echo date( "g" )."<br />\n";
            break;



        case "minute":
            echo date( "i" )."<br />\n";
            break;



        case "second":
            echo date( "s" )."<br />\n";
            break;



        case "am":
            echo date( "A" )."<br />\n";
            break;



        case "info":
            echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\n";
            echo "<tr><td class=\"end\" colspan=\"2\">Driver Basic 1.0</td></tr>\n";
            echo "<tr><td><b>System</b></td><td>\n<script language=\"JavaScript\">\nos = find_os();\ndocument.write( os );\n</script>\n</td></tr>\n";
            echo "<tr><td><b>Browser</b></td><td>\n<script language=\"JavaScript\">\ndocument.write( navigator.appName );\n</script>\n</td></tr>\n";
            echo "<tr><td><b>Author</b></td><td>Josiah Driver</td></tr>\n";
            echo "<tr><td><b>Production Release Date</b></td><td>Tuesday, February 26, 2008</td></tr>\n";
            echo "<tr><td><b>Engine</b></td><td>Cobra Engine 1</td></tr>\n";
            echo "<tr><td><b>Engine Coding Language</b></td><td>PHP</td></tr>\n";
            echo "<tr><td><b>Root Directory</b></td><td>localhost/Random/Driver_Basic/</td></tr>\n";
            echo "<tr><td><b>Script File Extensions</b></td><td>.dbs</td></tr>\n";
            echo "<tr><td><b>Manual Link</b></td><td><a href=\"manual/\">View Manual</a></td></tr>\n";
            echo "<tr><td><b>Version</b></td><td>1.0</td></tr>\n";
            echo "</table>\n";
            break;




        default:
            echo "<p class=\"error\"><b>Error: </b>Call to unknown command <b>".$command."</b> on line <b>".( $count + 1 )."</b> - <a href=\"manual/index.php?token=5.0#error1\">See Manual</a></p>\n";
            break;
    }
}

?>

</body>
</html>