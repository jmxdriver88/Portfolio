<?php

$root = "projects";

if( isset( $_GET['path'] ) )
    $path = $_GET['path'];

else
    $path = $root;

?>
<html>
<head>
<title>Driver Basic Scripting HQ</title>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

<?php

echo "<h2>Index of ".$path."</h2>\n";
echo "<ul>\n";

$directory = opendir( $path ) or die( "Couldn't open directory!" );

if( $path != $root )
{
    $newpath = explode( "/", $path );

    for( $count = 0; $count < count( $newpath ) - 1; ++$count )
        $uppath[$count] = $newpath[$count];

    $uppath = implode( "/", $uppath );
    echo "<li><a href=\"index.php?path=".$uppath."\">Up to higher directory</a></li>\n";
}

while( !( ( $file = readdir( $directory ) ) === false ) )
{
    if( $file == ".." || $file == "."  )
        continue;

    else if( is_dir( "$path/$file" ) )
        echo "<li><a href=\"index.php?path=".$path."/".$file."\">".$file."/</a></li>\n";

    else if( substr( $file, -4 ) != ".dbs" )
        continue;

    else
        echo "<li><a href=\"engine.php?path=".$path."/".$file."\">".$file."</a></li>\n";
}

closedir( $directory );

echo "</ul>\n";

?>

</body>
</html>