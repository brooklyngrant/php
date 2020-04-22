<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>PHP Chapter 1</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightblue;
                font-family: 'Open Sans', sans-serif;
            }
            h1 {
                padding: 10px;
                border: black 2px solid;
            }
            h2 {
                border-bottom: black 1px solid;
                padding: 5px;
            }
        </style>
    </head>
    <body>
        <h1>PHP Chapter 1</h1>
        <h2>Single Quotes and Double Quotes</h2>
            <p>The difference between single and double quotes in php is that those with single quotation marks will be treated literally whereas double quotation marks will be interpreted. An example of this would be if you say echo "$var" it will print whatever $var equals. If you say echo '$var' it will print $var.</p>
        <h2>Basic Debugging Techniques</h2>
            <p>In the text, it talks about 6 steps in debugging that will help when you are debugging your code. First, make sure that you are running PHP through a URL. Then know what version of PHP you are running, sometimes that affects the code. Then make sure display_errors is on. The check the HTML source code. Then fully read and trust any errors that pop up. Finally, take a break, sometimes you just need to step away.</p>
        <h2>$_SERVER</h2>
            <p>$_SERVER refers to a mass of server-related information. There are 3 variables the script uses. $_SERVER['SCRIPT_FILENAME'] stores the full path and name of the script being run. $_SERVER['HTTP_USER_AGENT'] represents the browser and operating system of the user accessing the script. $_SERVER['SERVER_SOFTWARE'] represents the web application on the server that is running PHP</p>
        <h2>PHP Section</h2>
        
        
    <?php # The purpose of this script is to practice php and show what I learned in chapter 1 of the book "PHP and MYSQL for Dynamic Websites".
        
        //Varibles that hold my full name and age
        
        $name = 'Brooklyn Grant';
        $age = 16;
        
        //A constant that holds another bit of information about you that won't change
        
        define('INFO', 'I like dogs');
        
        //Use php to find the length of your name, and print it as a string normally, in all lowercase, and all uppercase
        
        echo "Name Length: " . strlen($name) . "<br>";
        echo "Name: " . $name . "<br>";
        echo "Name(lower): " . strtolower($name) . "<br>";
        echo "Name(upper): " . strtoupper($name) . "<br>";
        
        //Use php to round the quotient (9 / 7) to the first four decimal places and to print 3005 with a comma (3,005)
        
        $number = 9/7;
        echo "9/7 = " . round($number, 4) . "<br>";
        echo "Number Format: " . number_format(3005) . "<br>";
        
        //Use PHP to concatenate your full name, age, the constant, and at least one other character
        
        echo 'My name is ' . $name . ' and I am ' . $age . ' years old. ' . INFO . '.<br>';
        
        //Use php to echo or print one line of HTML to the browser window as plain text and one line as interpreted HTML.
        
        echo '<p><strong>Welcome to my website</strong></p>';
        
    ?>
    
    </body>

</html>
