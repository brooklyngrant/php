<?php

session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login_new.php');
    }
        
            ini_set('display_errors', 1);
            require('/home/brooklyng/etc/sqli_connect.php');
        
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id = $_GET['id'];
            } else if (isset($_POST['id'])) {
                $id = $_POST['id'];
                
            } else {
                echo "You shouldn't be here, go away!";
            }    
        
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
                    $q = "UPDATE `Netflix` SET `title`='$title',`rating`='$rating',`ratingLevel`='$ratingLevel',`release year`='$releaseyear' WHERE `ID` = $id";  
                    $r = @mysqli_query($dbc, $q);
                    if ($r) {
                        echo 'It was edited';
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
            
        $q = "SELECT `ID`, `title`, `rating`, `ratingLevel`, `release year` FROM `Netflix` WHERE `ID` = $id";
        $r = @mysqli_query($dbc, $q);
        $row = mysqli_fetch_array($r, MYSQLI_NUM);
            
        
        
        ?>

<!doctype html>

<html lang="en">
    
    <head>
        <title>Netflix Shows - Edit Page</title>
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
    <body id="edit">
              
        
        <form action="" method="POST">
            <div id="div">
                <h1>Netflix Shows- Edit Page</h1>
                <h3>Edit</h3>  
                <input type="text" placeholder="Title" name="title" value="<?php if (isset($_POST['title'])) echo $_POST['title']; else echo $row[1];?>">
                <input type="text" placeholder="Rating" name="rating" value="<?php if (isset($_POST['rating'])) echo $_POST['rating']; else echo $row[2];?>">
                <input class="special" type="text" placeholder="Rating Level" name="ratinglevel" value="<?php if (isset($_POST['ratinglevel'])) echo $_POST['ratinglevel']; else echo $row[3];?>">
                <input type="text" placeholder="Release Year" name="releaseyear" value="<?php if (isset($_POST['releaseyear'])) echo $_POST['releaseyear']; else echo $row[4];?>">
            
                <input type="submit" value="Edit">
                <br/><p><a id="link" href="netflix.php">Go back</a></p>
                
            </div>
        </form>
        
    
    </body>
    
</html>










































