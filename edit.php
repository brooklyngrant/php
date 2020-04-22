<!doctype html>

<html lang="en">
    
    <head>
        <title>Marvel Characters - Edit Page</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightseagreen;
                font-family: 'Open Sans', sans-serif;
            }
            
        </style>
    </head>
    <body>
        <h1>Marvel Characters - Edit Page</h1>
        <h3>Edit the character...</h3>
        
        <?php
        
            ini_set('display_errors', 1);
            require('/home/brooklyng/etc/sqli_connect.php');
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            } else if (isset($_POST['id'])) {
                $id = $_POST['id'];
                
            } else {
                echo "You shouldn't be here, go away!";
            }
        
            
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $errors = [];
                
                
                //Name
                if (empty($_POST['name'])) {
                    $errors[] = 'You forgot to enter the characters name.';
                } else {
                    $name = mysqli_real_escape_string($dbc, trim($_POST['name']));
                }
                
                
                
                $q = "UPDATE `Marvel` SET `name`= $name WHERE `page_id` LIKE $id LIMIT 1";
                $r = @mysqli_query($dbc, $q);
                
                if(mysqli_affected_rows($dbc) == 1) {
                    echo '<p>The character has been edited!</p>';
                } else {
                    echo '<p>The hero could not be edited!</p>';
                }
                
            } else {
                $q = "SELECT `name` FROM `Marvel` WHERE `page_id` = $id";
                $r = @mysqli_query($dbc, $q);
                $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                echo '<h3>Name: ' . $row['name'] . '</h3>';
            }
            
            
        ?>
        
        
        
        <form action="" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>"/>
            <input type="submit" value="edit"/>
        </form>
        
        <p><a href="marvel.php">Go back</a></p>
    
    </body>
    
</html>










































