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
                $q = "DELETE FROM `Netflix` WHERE `ID` = $id";
                $r = @mysqli_query($dbc, $q);
                
                if(mysqli_affected_rows($dbc) == 1) {
                    echo '<p>It has been deleted!</p>';
                } else {
                    echo '<p>It could not be deleted!</p>';
                }
                
            } else {
                $q = "SELECT `title` FROM `Netflix` WHERE `ID` = $id";
                $r = @mysqli_query($dbc, $q);
                
            }
            
            
        ?>
<!doctype html>

<html lang="en">
    
    <head>
        <title>Netflix Shows - Delete Page</title>
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
    <body id="delete">
        
        <form action="" method="POST">
            <div id="div">
                <h1>Netflix Shows - Delete Page</h1>
                <h3>Are you sure? This is permanent</h3>
                <input type="hidden" name="id" value="<?php echo $title; ?>"/>
                <input type="submit" value="Delete"/>
                <br/><p><a id="link" href="netflix.php">Go back</a></p>
            </div>
        </form>
        
        
        
    
    </body>
    
</html>



