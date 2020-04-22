
        <?php

        session_start();
        if (!isset($_SESSION['user'])) {
            header('Location: login_new.php');
        }
        
            ini_set('display_errors', 1);
            require('/home/brooklyng/etc/sqli_connect.php');
        
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                
                
                //Name
                if (empty($_POST['title'])) {
                    $errors[] = 'You forgot to enter the title';
                } else {
                    $title = mysqli_real_escape_string($dbc, trim($_POST['title']));
                }
                
                if (empty($_POST['rating'])) {
                    $errors[] = 'You forgot to enter the rating';
                } else {
                    $rating = mysqli_real_escape_string($dbc, trim($_POST['rating']));
                }
                
                if (empty($_POST['ratinglevel'])) {
                    $errors[] = 'You forgot to enter the rating level';
                } else {
                    $ratingLevel = mysqli_real_escape_string($dbc, trim($_POST['ratinglevel']));
                }
                
                if (empty($_POST['releaseyear'])) {
                    $errors[] = 'You forgot to enter the release year';
                } else {
                    $releaseyear = mysqli_real_escape_string($dbc, trim($_POST['releaseyear']));
                }
                
                
                if (empty($errors)) {//this is wrong
                    $q = "INSERT INTO `Netflix`(`title`, `rating`, `ratingLevel`, `release year`) VALUES ('$title','$rating','$ratingLevel','$releaseyear')";  
                    $r = @mysqli_query($dbc, $q);
                    if ($r) {
                        echo 'It was added';
                    } else {
                        echo mysqli_error($dbc) . "<br>" . $q;
                    }
                } else {
                    echo "The following errors occurred: <br>";
                    foreach ($errors as $msg) {
                        echo " - $msg<br>\n";
                    }
                    echo "Please try again";
                }
                
                
            } else {
                echo mysqli_error($dbc);
            }
            
            
        
        
        ?>



<!doctype html>

<html lang="en">
    
    <head>
        <title>Netflix Shows - Add Page</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
        <style type="text/css">
            body {
                background-color: firebrick;
                font-family: 'Open Sans', sans-serif;
            }
            
        </style>
    </head>
    <body id="add" >
        
        <form action="" method="POST">
            <div id="div">
                <h1>Netflix Shows- Add Page</h1>
                <h3>Add Show or Movie</h3>
                <input type="text" placeholder="Title" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; ?>">
                <input type="text" placeholder="Rating" name="rating" value="<?php if (isset($_POST['rating'])) echo $_POST['rating']; ?>">
                <input class="special" type="text" placeholder="Rating Level" name="ratinglevel" value="<?php if (isset($_POST['ratinglevel'])) echo $_POST['ratinglevel']; ?>">
                <input type="text" placeholder="Release Year" name="releaseyear" value="<?php if (isset($_POST['releaseyear'])) echo $_POST['releaseyear']; ?>">
                <input type="submit" value="Add">
                <br/><p><a id="link" href="netflix.php">Go back</a></p>
            </div>
        </form>
        
        
    
    </body>
    
</html>










































