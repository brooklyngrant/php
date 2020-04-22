<!doctype html>

<html lang="en">
    
    <head>
        <title>Marvel Characters</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: lightseagreen;
                font-family: 'Open Sans', sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                
            }
            th {
                background-color: gray;
            }
            td {
                padding: 10px;
                text-align: center;
            }
            tr:nth-child(even) {
                background-color: lightgray;
            }
            tr:nth-child(odd) {
                background-color: lightblue;
            }
            form {
                margin: 30px 0;
            }
        </style>
    </head>
    <body>
        <h1>Marvel Characters</h1>
        <p>This table only shows the top 20 in the actual table, but feel free to use the search bar to see more!</p>
        
        <form action="" method="POST">
            <label>Search the Table!</label>
            <input type="text" name="search" value="<?php if(isset($_POST['search'])) echo $_POST['search'] ?>" />
            <input type="submit" value="Search!" />
        
        </form>
        
        <?php
        //require_once("../etc/sqli_connect.php");
        require_once("/home/brooklyng/etc/sqli_connect.php");
        
        $q = "UPDATE `Marvel` SET `APPEARANCES`= 4045 WHERE `name` LIKE 'Spider-Man%'";
        @mysqli_query($dbc, $q);
        
        $q = "DELETE FROM `Marvel` WHERE `name` LIKE 'ororo%'";
        @mysqli_query($dbc, $q);
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
//          $s = mysqli_real_escape_string($_REQUEST['search']);
            $s = $_REQUEST['search'];
            $q = "SELECT `page_id`, `name`, `ALIGN`, `APPEARANCES` FROM `Marvel` WHERE `name` LIKE '%$s%' OR `ALIGN` LIKE '%$s%' or `APPEARANCES` LIKE '%$s%' LIMIT 50";
        } else {
            $q = "SELECT `page_id`, `name`, `ALIGN`, `APPEARANCES` FROM `Marvel` limit 20";
        }
        
        
        
        
        $r = @mysqli_query($dbc, $q);
        
        if ($r) {
            echo "<table><tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th>Page ID</th>
                    <th>Name</th>
                    <th>Alignment</th>
                    <th>Appearances</th></tr>";
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { //mysql_assoc is column names, and mysql_num is number of column
                echo "<tr><td>| <a href='edit.php?id=" . $row['page_id'] . "'> edit </a> |</td><td>| <a href='delete.php?id=" . $row['page_id'] . "'> delete</a> |</td><td>" . $row['page_id'] . "</td><td>" . $row['name'] . "</td><td>" . $row['ALIGN'] . "</td><td>" . $row['APPEARANCES'] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo mysqli_error($dbc);
        }
        
        ?>
    
    </body>
    
</html>










































