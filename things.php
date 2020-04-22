<!doctype html>

<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Things</title>
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightgreen;
                font-family: 'Open Sans', sans-serif;
            }
        </style>
    </head>
    <body>
        <?php
        
            function PrintSuccess() {
                echo "Form successfully completed!";
            }
                
                
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                if(!empty($_POST['things'])) {
                    PrintSuccess();
                } else {
                    echo "Please fill out the form!";
                }
            }
        ?>
        <h1>First Form</h1>
        <form action="" method="post">
            <label>Things: </label>
            <input type="text" name="things" placeholder="things" 
                   value="<?php if(isset($_POST['things'])) echo $_POST['things'];?>" />
            <br/>
            <input type="submit" />
        </form>
    
    </body>

</html>