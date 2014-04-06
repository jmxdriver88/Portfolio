<?php

if( isset( $_GET['token'] ) )
    $token = $_GET['token'];

else
    $token = "1.0";

switch( $token )
{
    case "1.0":
        $header = "Introduction";
        break;

    case "2.0":
        $header = "Creating Scripts";
        break;

    case "3.0":
        $header = "Viewing Scripts";
        break;

    case "4.0":
        $header = "Commands";
        break;

    case "4.1":
        $header = "The Write Command";
        break;

    case "4.2":
        $header = "The Variable Command";
        break;

    case "4.3":
        $header = "Mathematic Commands";
        break;

    case "4.3.1":
        $header = "The Add Command";
        break;

    case "4.3.2":
        $header = "The Subtract Command";
        break;

    case "4.3.3":
        $header = "The Multiply Command";
        break;

    case "4.3.4":
        $header = "The Divide Command";
        break;

    case "4.3.5":
        $header = "The Squareroot Command";
        break;

    case "4.4":
        $header = "The Concat Command";
        break;

    case "4.5":
        $header = "The Reverse Command";
        break;

    case "4.6":
        $header = "Date Commands";
        break;

    case "4.6.1":
        $header = "The Date Command";
        break;

    case "4.6.2":
        $header = "The Timestamp Command";
        break;

    case "4.6.3":
        $header = "The Year Command";
        break;

    case "4.6.4":
        $header = "The Month Command";
        break;

    case "4.6.5":
        $header = "The Day Command";
        break;

    case "4.6.6":
        $header = "The Dayofweek Command";
        break;

    case "4.6.7":
        $header = "The Hour Command";
        break;

    case "4.6.8":
        $header = "The Minute Command";
        break;

    case "4.6.9":
        $header = "The Second Command";
        break;

    case "4.6.10":
        $header = "The AM Command";
        break;

    case "4.7":
        $header = "The Info Command";
        break;

    case "5.0":
        $header = "Error Messages";
        break;

    case "6.0":
        $header = "Credits";
        break;

    default:
        $header = "Driver Basic";
        break;
}

$path = __FILE__;
$path = substr_replace( $path, "", -16 );
$path .= "Projects";

?>
<html>
<head>
<title><?php echo $token." ".$header; ?> - DBS Manual</title>
<link rel="stylesheet" type="text/css" href="../style.css" />
<style type="text/css">

body {
	margin: 0;
	padding: 0;
}

</style>
</head>

<body>

<div class="nav">

<ul class="nav_links">
  <li><a href="index.php?token=1.0"><b>1.0 </b>Introduction</a></li>
  <li><a href="index.php?token=2.0"><b>2.0 </b>Creating Scripts</a></li>
  <li><a href="index.php?token=3.0"><b>3.0 </b>Viewing Scripts</a></li>
  <li>
  <a href="index.php?token=4.0"><b>4.0 </b>Commands</a>
  <ul>
    <li><a href="index.php?token=4.1"><b>4.1 </b>Write</a></li>
    <li><a href="index.php?token=4.2"><b>4.2 </b>Variable</a></li>
    <li>
    <a href="index.php?token=4.3"><b>4.3 </b>Mathematic Commands</a>
    <ul>
      <li><a href="index.php?token=4.3.1"><b>4.3.1 </b>Add</a></li>
      <li><a href="index.php?token=4.3.2"><b>4.3.2 </b>Subtract</a></li>
      <li><a href="index.php?token=4.3.3"><b>4.3.3 </b>Multiply</a></li>
      <li><a href="index.php?token=4.3.4"><b>4.3.4 </b>Divide</a></li>
      <li><a href="index.php?token=4.3.5"><b>4.3.5 </b>Squareroot</a></li>
    </ul>
    </li>
    <li><a href="index.php?token=4.4"><b>4.4 </b>Concat</a></li>
    <li><a href="index.php?token=4.5"><b>4.5 </b>Reverse</a></li>
    <li>
    <a href="index.php?token=4.6"><b>4.6 </b>Date Commands</a>
    <ul>
      <li><a href="index.php?token=4.6.1"><b>4.6.1 </b>Date</a></li>
      <li><a href="index.php?token=4.6.2"><b>4.6.2 </b>Timestamp</a></li>
      <li><a href="index.php?token=4.6.3"><b>4.6.3 </b>Year</a></li>
      <li><a href="index.php?token=4.6.4"><b>4.6.4 </b>Month</a></li>
      <li><a href="index.php?token=4.6.5"><b>4.6.5 </b>Day</a></li>
      <li><a href="index.php?token=4.6.6"><b>4.6.6 </b>Dayofweek</a></li>
      <li><a href="index.php?token=4.6.7"><b>4.6.7 </b>Hour</a></li>
      <li><a href="index.php?token=4.6.8"><b>4.6.8 </b>Minute</a></li>
      <li><a href="index.php?token=4.6.9"><b>4.6.9 </b>Second</a></li>
      <li><a href="index.php?token=4.6.10"><b>4.6.10 </b>AM</a></li>
    </ul>
    </li>
    <li><a href="index.php?token=4.7"><b>4.7 </b>Info</a></li>
  </ul>
  <li><a href="index.php?token=5.0"><b>5.0 </b>Error Messages</a></li>
  <li><a href="index.php?token=6.0"><b>6.0 </b>Credits</a></li>
  </li>
</ul>

</div>

<div class="main">

<h2><?php echo $token." ".$header; ?></h2>
<span>&nbsp;</span>

<?php

switch( $token )
{
    case "1.0":
        echo "<p class=\"first\">\n";
        echo "Welcome, lucky learner of Driver Basic Script! :) This is a script that I created mostly for the fun of it but also to give beginning programmers a chance to get their feet wet before moving on to a more complicated language. It's a very simple language and doesn't have much functionality, which is ideal for beginners.\n";
        echo "</p>\n";
        echo "<p>Before we take a look at the language, I need to classify a few of the typographic styles we use in the manual. First of all, all code will be indented like this:</p>\n";
        echo "<pre>\n\tsample piece of code</pre>\n";
        echo "<p>Now let's take a look at some of the colors:</p>\n";
        echo "<pre>\n\ttext in this font is used for general code.</pre>\n";
        echo "<pre>\n<b class=\"command\">\ttext in this color is used for commands.</b></pre>\n";
        echo "<pre>\n<b class=\"var\">\ttext in this color is used for variables.</b></pre>\n";
        echo "<pre>\n<b class=\"output\">\ttext in this color is used for the code output.</b></pre>\n";
        echo "<p>(words in parentheses) -- both in the code and outside it -- are used to indicate that they are not the real text but that the user should fill in his own text there.</p>\n";
        echo "<p>If you didn't understand some of the words I used like variable or command, don't worry; we'll get to those later. In the meantime, just remember: Commands are red, Variables are blue, and output is green.</p>\n";
        echo "<p><b>Note:</b> This manual and language are copyrighted to Josiah Driver as of 2008. All rights are reserved. Any unauthorized reproduction or resale is strictly prohibited. Violators will be prosecuted to the full extent of the law.</p>\n";
        echo "<p class=\"link\"><a>Back</a><a href=\"index.php?token=2.0\">Next</a></p>\n";
        break;

    case "2.0":
        echo "<p class=\"first\">\n";
        echo "In order to write scripts with Driver Basic, you have to save your scripts in the Projects folder. If you don't know where that is, it's absolute path, that is the path from disk <b>C:</b>, is <b>".$path."</b>.\n";
        echo "</p>\n";
        echo "<p>Now that you've found the Projects folder, or root folder, as we call it, you can can make more folders inside it if you want. To put a script file in there, simply save it with a dbs extension. For example, if I have a script that I want to name test, I would save it as test.dbs, somewhere in the root (projects) folder.</p>\n";
        echo "<p>To do this, open up a text-editor like notepad or wordpad. <b>Warning:</b> Do not use word processors like Microsoft Works to write your scripts in. They tend to add a lot of extra gibberish into the file that confuses the DBS engine. Anyway, after you're done writing your code, save it somewhere in the root folder as (yournamehere).dbs. The DBS engine will only read .dbs files.</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=1.0\">Back</a><a href=\"index.php?token=3.0\">Next</a></p>\n";
        break;

    case "3.0":
        echo "<p class=\"first\">\n";
        echo "In order to process and view your scripts, go to the Driver Basic Scripting Headquarters. If you don't know where that is, <a href=\"../index.php\">click here</a>. You should see something that looks like this:\n";
        echo "</p>\n";
        echo "<div class=\"box\">\n";
        echo "<h2><b>Index of Projects</b></h2>\n";
        echo "<ul>\n";
        echo "<li><a>sample_folder/</a></li>\n";
        echo "<li><a>sample1.dbs</a></li>\n";
        echo "<li><a>sample2.dbs</a></li>\n";
        echo "</ul>\n";
        echo "</div>\n";
        echo "<p>To view your script, simply navigate to it and click it. Then it will be processed and displayed.</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=2.0\">Back</a><a href=\"index.php?token=4.0\">Next</a></p>\n";
        break;

    case "4.0":
        echo "<p class=\"first\">\n";
        echo "To visualize how the Driver Basic Script works, think about a King. If he wants something done, he will give a command. In the same way, since you are essentially the king of your script, you can issue a command and the DBS engine (your loyal subject : ) will process it and return the result of that command.\n";
        echo "</p>\n";
        echo "<p>Each command is written on a new line. It does not matter what case it is in; it can be uppercase or lower, your choice. You may have as many new lines between your commands as you want, but always remember to keep all your command syntax on one line.</p>\n";
        echo "<p>If the command has instructions after it, they are separated from the command by a space. For example, this is what a sample code looks like:</p>\n";
        echo "<pre>\n\t<b class=\"command\">(command)</b> (instructions)\n\t<b class=\"command\">(command without instructions)</b>\n\n\n\t<b class=\"command\">(command)</b> (you can separate commands by as many newlines as you want)\n</pre>\n";
        echo "<p><b>Note:</b> Be careful to separate your commands and instructions with a space. If you don't, the DBS engine will think the instructions are part of the command and will not recognize it. Also, even though these sample commands and instructions have parentheses, the real ones don't.</p>\n";
        echo "<p>So now that you understand what commands are, lets take a look at your first command, the <b>write</b> command.</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=3.0\">Back</a><a href=\"index.php?token=4.1\">Next</a></p>\n";
        break;

    case "4.1":
        echo "<p class=\"first\">\n";
        echo "Okay, this command is very simple. Basically, it writes to the screen whatever follows the command on that line. For example, if I type:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">write</b> hello world\n</pre>\n";
        echo "<p>It will output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">hello world</b>\n</pre>\n";
        echo "<p>And that's it, no quotes, escapes or anything else. Just be sure to separate the text from the command with a space.</p>\n";
        echo "<p>Now the <b>write</b> command can also write variables. For example, the line:</p>\n";
        echo "<pre>\n\t<b class=\"command\">write</b> <b class=\"var\">!fred</b>\n</pre>\n";
        echo "<p>Will output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">(fred's contents)</b>\n</pre>\n";
        echo "<p>Now, if you don't have a clue what a variable is or why it has that exclamation mark in front of it -- which you probably don't -- don't worry, I'll cover that next.</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.0\">Back</a><a href=\"index.php?token=4.2\">Next</a></p>\n";
        break;

    case "4.2":
        echo "<p class=\"first\">\n";
        echo "Before we learn this next command, let me introduce to you the concept of variables, the things that had you so confused in the last section. If you already know what they are, skip this paragraph. To understand what a variable is, think of a box that has it's name, Bob the Box, written on the side. Now the king (remember him?) tells his squire, \"Go to the box named Bob the Box and bring me it's contents\". In the same way, a variable is like a box. It has a name, so you can locate it, and it can hold information like a number or some text. So, let's take a look at that last command:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">write</b> <b class=\"var\">!fred</b>\n</pre>\n";
        echo "<p>It will output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">(fred's contents)</b>\n</pre>\n";
        echo "<p>Okay, let's take a look at what just happened here. You, the king, just told the DBS engine, your squire, to go to the variable fred, the box, and write out its contents. Notice that instead of outputting \"!fred\", as you might have thought, the <b>write</b> command outputs fred's contents instead. This is because it had an exclamation point in front of it. When you call a variable, always put an exclamation mark in front, so the DBS will know to get a variable instead of what you actually wrote. Notice what happens when we forget the exclamation mark:</p>\n";
        echo "<pre>\n\t<b class=\"command\">write</b> <b class=\"var\">fred</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">fred</b>\n</pre>\n";
        echo "<p>Okay, so instead of going to the variable fred and outputting it's contents, the DBS engine interprets your text literally and outputs exactly what you wrote. So, always remember to put an exclamation mark before calling a variable.</p>\n";
        echo "<p>Now, of course, before you can call a variable, you have to create it. This is where the <b>variable</b> command comes into play. The <b>variable</b> command creates variables so you can call them later. This is what it looks like:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">fred</b> !I am fred's contents.\n</pre>\n";
        echo "<p>So what happened there? Well, when you wrote the <b>variable</b> command, it told the DBS engine to get ready to make a variable. The next part, the part in blue, told the DBS the variable's name. The name is not allowed to contain any spaces or dollar signs. Then, the last part was the variable's contents. This is allowed to contain spaces, dollar signs, and everything else. Notice how I put an exclamation mark in front of the contents. This is because a variable can hold two types of data: text or a numbers. Numbers don't have anything in front, but text has an exclamation mark in front. Okay, so let's try combining these to commands:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">fred</b> !I am fred's contents.\n\t<b class=\"command\">write</b> <b class=\"var\">!fred</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">I am fred's contents.</b>\n</pre>\n";
        echo "<p>Tada! I hope you got that; if you didn't, please contact someone you know who understands variables.</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.1\">Back</a><a href=\"index.php?token=4.3\">Next</a></p>\n";
        break;

    case "4.3":
        echo "<p class=\"first\">\n";
        echo "This next section contains simple mathematic commands. They accept only numbers; if they are given a string, they will interpret it as zero. They can, however, accept variables that contain numbers.\n";
        echo "</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.2\">Back</a><a href=\"index.php?token=4.3.1\">Next</a></p>\n";
        break;

    case "4.3.1":
        echo "<p class=\"first\">\n";
        echo "This command simply adds two numbers. It need's two numbers to complete the addition, but it can only process two. Do not try to give it more than two numbers. Lets see this in action:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">add</b> 2 2\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">4</b>\n</pre>\n";
        echo "<p>Okay, so the <b>add</b> command simply accepts two numbers separated by spaces and outputs the result. It can also add variables. For example:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">number</b> 64\n\t<b class=\"command\">add</b> 36 <b class=\"var\">!number</b>\n</pre>\n";
        echo "<p>Will output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">100</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3\">Back</a><a href=\"index.php?token=4.3.2\">Next</a></p>\n";
        break;

    case "4.3.2":
        echo "<p class=\"first\">\n";
        echo "The <b>subtract</b> command is identical to the <b>add</b> command except that it subtracts the second number from the first:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">subtract</b> 15 5\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">10</b>\n</pre>\n";
        echo "<p>Like the <b>add</b> command, it can also take variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">one</b> 30\n\t<b class=\"command\">variable</b> <b class=\"var\">two</b> 10\n\t<b class=\"command\">subtract</b> <b class=\"var\">!one !two</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">20</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3.1\">Back</a><a href=\"index.php?token=4.3.3\">Next</a></p>\n";
        break;

    case "4.3.3":
        echo "<p class=\"first\">\n";
        echo "The <b>multiply</b> command multiplies two numbers:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">multiply</b> 5 5\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">25</b>\n</pre>\n";
        echo "<p>It can also take variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">one</b> 10\n\t<b class=\"command\">multiply</b> <b class=\"var\">!one</b> 5\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">50</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3.2\">Back</a><a href=\"index.php?token=4.3.4\">Next</a></p>\n";
        break;

    case "4.3.4":
        echo "<p class=\"first\">\n";
        echo "The <b>divide</b> command divides the first number by the second:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">divide</b> 49 7\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">7</b>\n</pre>\n";
        echo "<p>It can also take variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">one</b> 15\n\t<b class=\"command\">divide</b> <b class=\"var\">!one 3</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">5</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3.3\">Back</a><a href=\"index.php?token=4.3.5\">Next</a></p>\n";
        break;

    case "4.3.5":
        echo "<p class=\"first\">\n";
        echo "This command only accepts one number. Then it finds it's square root. For example:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">squareroot</b> 49\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">7</b>\n</pre>\n";
        echo "<p>Like evey other command, it takes variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">one</b> 15\n\t<b class=\"command\">squareroot</b> <b class=\"var\">!one</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">3.8729833462074170214</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3.4\">Back</a><a href=\"index.php?token=4.4\">Next</a></p>\n";
        break;

    case "4.4":
        echo "<p class=\"first\">\n";
        echo "The <b>concat</b> command simply pieces together two or more strings and outputs them as one big string. You can concat as many strings as you want, just separate them by the following characters in red: <b class=\"red\">.*.</b>. Take a look at the following code:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">concat</b> hello.*. .*.world!\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">hello world</b>\n</pre>\n";
        echo "<p>You can also concat variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">string1</b> !Driver\n\t<b class=\"command\">variable</b> <b class=\"var\">string2</b> !Basic\n\t<b class=\"command\">variable</b> <b class=\"var\">string3</b> !Script\n\t<b class=\"command\">concat</b> <b class=\"var\">!string1</b>.*.<b class=\"var\">!string2</b>.*.<b class=\"var\">!string3</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">Driver Basic Script</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.3.5\">Back</a><a href=\"index.php?token=4.5\">Next</a></p>\n";
        break;

    case "4.5":
        echo "<p class=\"first\">\n";
        echo "The <b>reverse</b> command simply reverses a string and outputs it:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">reverse</b> hello world\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">dlrow olleh</b>\n</pre>\n";
        echo "<p>You can also reverse variables:</p>\n";
        echo "<pre>\n\t<b class=\"command\">variable</b> <b class=\"var\">string</b> !Driver Basic Script\n\t<b class=\"command\">reverse</b> <b class=\"var\">!string</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">tpircS cisaB revirD</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.4\">Back</a><a href=\"index.php?token=4.6\">Next</a></p>\n";
        break;

    case "4.6":
        echo "<p class=\"first\">\n";
        echo "The following commands are date commands. They do not require any instructions, all you need to do is type the command.\n";
        echo "</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.5\">Back</a><a href=\"index.php?token=4.6.1\">Next</a></p>\n";
        break;

    case "4.6.1":
        echo "<p class=\"first\">\n";
        echo "The <b>date</b> command outputs the current date to the second:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">date</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">Thursday, February 28, 2008, 3:50:24 PM</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6\">Back</a><a href=\"index.php?token=4.6.2\">Next</a></p>\n";
        break;

    case "4.6.2":
        echo "<p class=\"first\">\n";
        echo "The <b>timestamp</b> command outputs the unix timestamp, which is the amount of seconds passed since Midnight, January 1, 1970 GMT:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">timestamp</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">1204231949</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.1\">Back</a><a href=\"index.php?token=4.6.3\">Next</a></p>\n";
        break;

    case "4.6.3":
        echo "<p class=\"first\">\n";
        echo "If you want to break up the date, you can use the following eight commands to output specific parts of the date. The <b>year</b> command outputs the year with four digits:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">year</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">2008</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.2\">Back</a><a href=\"index.php?token=4.6.4\">Next</a></p>\n";
        break;

    case "4.6.4":
        echo "<p class=\"first\">\n";
        echo "This command outputs the month of the year:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">month</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">February</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.3\">Back</a><a href=\"index.php?token=4.6.5\">Next</a></p>\n";
        break;

    case "4.6.5":
        echo "<p class=\"first\">\n";
        echo "The <b>day</b> command outputs the day of the month:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">day</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">28</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.4\">Back</a><a href=\"index.php?token=4.6.6\">Next</a></p>\n";
        break;

    case "4.6.6":
        echo "<p class=\"first\">\n";
        echo "The <b>dayofweek</b> command outputs the day of the week:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">dayofweek</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">Thursday</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.5\">Back</a><a href=\"index.php?token=4.6.7\">Next</a></p>\n";
        break;

    case "4.6.7":
        echo "<p class=\"first\">\n";
        echo "The <b>hour</b> command outputs the hour in a 12-hour format:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">hour</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">3</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.6\">Back</a><a href=\"index.php?token=4.6.8\">Next</a></p>\n";
        break;

    case "4.6.8":
        echo "<p class=\"first\">\n";
        echo "The <b>minute</b> command outputs the minute of the hour:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">minute</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">00</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.7\">Back</a><a href=\"index.php?token=4.6.9\">Next</a></p>\n";
        break;

    case "4.6.9":
        echo "<p class=\"first\">\n";
        echo "The <b>second</b> command outputs the second of the minute:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">second</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">15</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.8\">Back</a><a href=\"index.php?token=4.6.10\">Next</a></p>\n";
        break;

    case "4.6.10":
        echo "<p class=\"first\">\n";
        echo "The <b>am</b> command outputs if it's AM or PM:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">am</b>\n</pre>\n";
        echo "<p>Output:</p>\n";
        echo "<pre>\n\t<b class=\"output\">PM</b>\n</pre>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.9\">Back</a><a href=\"index.php?token=4.7\">Next</a></p>\n";
        break;

    case "4.7":
        echo "<p class=\"first\">\n";
        echo "This is a unique command that outputs information about Driver Basic Script:\n";
        echo "</p>\n";
        echo "<pre>\n\t<b class=\"command\">info</b>\n</pre>\n";
        echo "<p>The output should look something like this:</p>\n";
        echo "<div class=\"box\">\n";
        echo "<table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" align=\"center\">\n";
        echo "<tr><td class=\"end\" colspan=\"2\">Driver Basic 1.0</td></tr>\n";
        echo "<tr><td><b>System</b></td><td>".PHP_OS."</script>\n</td></tr>\n";
        echo "<tr><td><b>Browser</b></td><td>\n<script language=\"JavaScript\">\ndocument.write( navigator.appName );\n</script>\n</td></tr>\n";
        echo "<tr><td><b>Author</b></td><td>Josiah Driver</td></tr>\n";
        echo "<tr><td><b>Production Release Date</b></td><td>Tuesday, February 26, 2008</td></tr>\n";
        echo "<tr><td><b>Engine</b></td><td>Cobra Engine 1</td></tr>\n";
        echo "<tr><td><b>Engine Coding Language</b></td><td>PHP</td></tr>\n";
        echo "<tr><td><b>Root Directory</b></td><td>localhost/Random/Driver_Basic/</td></tr>\n";
        echo "<tr><td><b>Script File Extensions</b></td><td>.dbs</td></tr>\n";
        echo "<tr><td><b>Manual Link</b></td><td><a>View Manual</a></td></tr>\n";
        echo "<tr><td><b>Version</b></td><td>1.0</td></tr>\n";
        echo "</table>\n";
        echo "</div>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=4.6.10\">Back</a><a href=\"index.php?token=5.0\">Next</a></p>\n";
        break;

    case "5.0":
        echo "<p class=\"first\">\n";
        echo "No matter how easy a programming language is, there will always be error in the code. When this happens, the engine will usually output an error message telling you what's wrong. This section takes a look at some of the error messages you might encounter.\n";
        echo "</p>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error1\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Call to unknown command <b>(unknown command)</b> on line <b>3</b></p>\n";
        echo "<p>This error message means that the engine does not understand a command that was given. The \"on line 3\" part tells you the line number of the error, starting at 1. This helps you find your error more easily. <b>Note:</b> The line numbers in this page are purely random. Your line number can be totally different than these.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>There is no space between the command and its instructions.</li>\n";
        echo "<li>The command is misspelled.</li>\n";
        echo "<li>The preceding command was allowed to drop down to the next line.</li>\n";
        echo "<li>The command really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error2\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot write a variable that doesn't exist on line <b>5</b></p>\n";
        echo "<p>This error message means that the engine was commanded to write a variable but couldn't find it.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>The variable name is misspelled.</li>\n";
        echo "<li>There is no exclamation mark in front of the variable name.</li>\n";
        echo "<li>The variable was created after the command to write it.</li>\n";
        echo "<li>The variable really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error3\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Variable name is not allowed to contain a <b>$</b> on line <b>1</b></p>\n";
        echo "<p>This error message means that a variable was attempted to be created but had the character \"$\" in it's name. That is not allowed.</p>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error4\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Variable needs a name on line <b>2</b></p>\n";
        echo "<p>This error message means that a variable was attempted to be created but the space for a name was left empty.</p>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error5\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Variable needs some content on line <b>4</b></p>\n";
        echo "<p>This error message means that a variable was attempted to be created but the space for the content was left empty.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>There is no space between the name and the content.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error6\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot preform (mathematical command) with a variable that doesn't exist on line <b>5</b></p>\n";
        echo "<p>This error message means that the engine was commanded to preform a mathematical command with a variable but couldn't find it.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>The variable name is misspelled.</li>\n";
        echo "<li>There is no exclamation mark in front of the variable name.</li>\n";
        echo "<li>The variable was created after the command.</li>\n";
        echo "<li>The variable really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error7\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>(mathematical command) requires two numbers on line <b>3</b></p>\n";
        echo "<p>This error message means that the engine was commanded to preform a mathematical command but couldn't find two numbers.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>Their is no space between the two numbers.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error8\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Squareroot command requires a number on line <b>10</b></p>\n";
        echo "<p>This error message means that the engine was commanded to preform the <b>squareroot</b> command but couldn't find a number.</p>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error9\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot find the square root of a variable that doesn't exist on line <b>7</b></p>\n";
        echo "<p>This error message means that the engine was commanded to preform the <b>squareroot</b> command with a variable but couldn't find it.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>The variable name is misspelled.</li>\n";
        echo "<li>There is no exclamation mark in front of the variable name.</li>\n";
        echo "<li>The variable was created after the <b>squareroot</b> command.</li>\n";
        echo "<li>The variable really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error10\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot concat an empty string on line <b>8</b></p>\n";
        echo "<p>This error message means that the engine was commanded to concat a string but found no string.</p>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error11\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot concat with a variable that doesn't exist on line <b>9</b></p>\n";
        echo "<p>This error message means that the engine was commanded to concat a variable but couldn't find it.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>The variable name is misspelled.</li>\n";
        echo "<li>There is no exclamation mark in front of the variable name.</li>\n";
        echo "<li>The variable was created after the <b>concat</b> command.</li>\n";
        echo "<li>The variable really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<hr width=\"100%\" color=\"cccccc\" size=\"1\" />\n";
        echo "<a name=\"error12\"></a>\n";
        echo "<p class=\"error\"><b>Error: </b>Cannot reverse a variable that doesn't exist on line <b>8</b></p>\n";
        echo "<p>This error message means that the engine was commanded to reverse a variable but couldn't find it.</p>\n";
        echo "<p>Here are some common mistakes that trigger this error:</p>\n";
        echo "<ul>\n";
        echo "<li>The variable name is misspelled.</li>\n";
        echo "<li>There is no exclamation mark in front of the variable name.</li>\n";
        echo "<li>The variable was created after the <b>reverse</b> command.</li>\n";
        echo "<li>The variable really doesn't exist.</li>\n";
        echo "</ul>\n";

        echo "<p class=\"link\"><a href=\"index.php?token=4.7\">Back</a><a href=\"index.php?token=6.0\">Next</a></p>\n";
        break;

    case "6.0":
        echo "<p class=\"first\">\n";
        echo "Author: Josiah Driver\n";
        echo "</p>\n";
        echo "<p>Designer: Josiah Driver</p>\n";
        echo "<p>Engine Coding Language: PHP</p>\n";
        echo "<p>Inspiration: The JUST Basic Language</p>\n";
        echo "<p class=\"link\"><a href=\"index.php?token=5.0\">Back</a><a>Next</a></p>\n";
        break;

    default:
        echo "<p class=\"first\">\n";
        echo "<a href=\"index.php?token=1.0\">Go to index</a>\n";
        echo "</p>\n";
        break;
}

?>

</div>

</body>
</html>