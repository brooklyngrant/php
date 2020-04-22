<!doctype html>

<html lang="en">
    
    <head>
        <title>Marvel Characters - Delete Page</title>
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
        
        <h1>Marvel Characters - Delete Page</h1>
        
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
                $q = "DELETE FROM `Marvel` WHERE `page_id` = $id";
                $r = @mysqli_query($dbc, $q);
                
                if(mysqli_affected_rows($dbc) == 1) {
                    echo '<p>The character has been deleted</p>';
                } else {
                    echo '<p>The hero could not be deleted!</p>';
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
            <input type="submit" value="delete"/>
        </form>
        
        <p><a href="marvel.php">Go back</a></p>
        
        
    
    </body>
    
</html>










































