<?php
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login_new.php');
    }

    
?>

<!doctype html>

<html lang="en">
    
    <head>
        <title>Netflix Shows</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <style type="text/css">
            body {
                background-color: firebrick;
                font-family: 'Open Sans', sans-serif;
            }
            table {
                width: 100%;
                border-collapse: collapse;
                
            }
            th {
                background-color: gray;
                font-weight: bold;
            }
            td {
                padding: 10px;
                text-align: center;
            }
            tr:nth-child(even) {
                background-color: lightgray;
            }
            tr:nth-child(odd) {
                background-color: white;
            }
            form {
                margin: 30px 0;
            }
            
            #links {
                display: inline-flex;
                justify-content: space-between;
            }
            
            #links {
                display: block;
                text-align: center;
                background-color: lightgray;
                padding: 10px;
                
            }
            #links a {
                padding: 10px;
                color: black;
                text-decoration: none;
                transition: 2s;
                
            }
            #links a:hover {
                letter-spacing: 1px;
            }
            
            .buttons {
                text-decoration: none;
                color: white;
                background-color: grey;
                padding: 5px;
                border-radius: 5px;
            }
            
        </style>
    </head>
    <body>
        <h1>Netflix Shows</h1>
        
        <?php 
        $username = $_SESSION['user']; 
        echo "You are logged in as: " . $username;
        
        ?>
        
        <form action="" method="POST">
            <label>Search the Table!</label>
            <input type="text" name="search" value="<?php if(isset($_POST['search'])) echo $_POST['search'] ?>" />
            <input type="submit" value="Search!" />
        
        </form>
        
        <div id="links"> 
            <a href="netflix.php">Reset Table</a>

            <a href="addpage.php">Add Show or Movie</a>
            
            <a href="register.php">Add a new user</a>
            
            <a href="logout_new.php">Logout</a>
        </div>
        
        
        
        
        
        
        <?php
        //require_once("../etc/sqli_connect.php");
        require_once("/home/brooklyng/etc/sqli_connect.php");
        
        
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'idsort';
        
        switch ($sort) {
            case 'title':
                $order_by = 'title ASC';
                break;
            case 'rate':
                $order_by = 'rating ASC';
                break;
            case 'ratelev':
                $order_by = 'ratingLevel ASC';
                break;
            case 'ry':
                $order_by = '`release year` ASC';
                break;
            case 'idsort':
                $order_by = 'ID ASC';
                break;
            default:
                $order_by = 'ID ASC';
                $sort = "ID ASC";
                break;
        }           
                   
                   
        $display =25;
        $isPost = 0;
        
        
                   
        if($_SERVER['REQUEST_METHOD'] == 'POST') { //if it is posted
            $search = mysqli_real_escape_string($dbc, $_REQUEST['search']);
            
            if (isset($_GET['p']) && is_numeric($_GET['p'])) {
                $pages = $_GET['p'];
            
            } else {
                $q = "SELECT COUNT(`ID`) FROM `Netflix` WHERE `title` LIKE '%$search%' OR `rating` LIKE '%$search%' OR `ratingLevel` LIKE '%$search%' OR `release year` LIKE '%$search%' ORDER BY $order_by";
                $r = @mysqli_query($dbc, $q);
                $row = @mysqli_fetch_array($r, MYSQLI_NUM);
                $records = $row[0];

                if ($records > $display) {
                    $pages = ceil ($records / $display);
                } else {
                    $pages = 1;
                }
            }

            if (isset($_GET['s']) && is_numeric($_GET['s'])) {
                $start = $_GET['s'];
            } else {
                $start = 0;
            }
            
            
            $q = "SELECT `ID`, `title`,`rating`,`ratingLevel`,`release year` FROM `Netflix` WHERE `title` LIKE '%$search%' OR `rating` LIKE '%$search%' OR `ratingLevel` LIKE '%$search%' OR `release year` LIKE '%$search%' ORDER BY $order_by LIMIT $start, $display";
            $r = @mysqli_query($dbc, $q);
            
            $isPost = 1;
            
            
            
        } else if (isset($_GET['t'])) { //if t has been set
            $search = $_GET['t'];
            $start = $_GET['s'];
            $pages = $_GET['p'];
            
            
            $q = "SELECT `ID`, `title`,`rating`,`ratingLevel`,`release year` FROM `Netflix` WHERE `title` LIKE '%$search%' OR `rating` LIKE '%$search%' OR `ratingLevel` LIKE '%$search%' OR `release year` LIKE '%$search%' ORDER BY $order_by LIMIT $start, $display";
            $r = @mysqli_query($dbc, $q);
            
            
            
        } else if ($isPost == 0) {   //if not a post  
            
            
            if (isset($_GET['p']) && is_numeric($_GET['p'])) {
                $pages = $_GET['p'];
            
            } else {
                $q = "SELECT COUNT(ID) FROM `Netflix`";
                $r = @mysqli_query($dbc, $q);
                $row = @mysqli_fetch_array($r, MYSQLI_NUM);
                $records = $row[0];

                if ($records > $display) {
                    $pages = ceil ($records / $display);
                } else {
                    $pages = 1;
                }
            }

            if (isset($_GET['s']) && is_numeric($_GET['s'])) {
                $start = $_GET['s'];
            } else {
                $start = 0;
            }

            $q = "SELECT `ID`, `title`,`rating`,`ratingLevel`,`release year` FROM `Netflix` ORDER BY $order_by LIMIT $start, $display";
            $r = @mysqli_query($dbc, $q);
            
            $isPost = 0;
            
            
        }
                   
          
        
        //---------------------------------------------------------------------
                   
        
        if ($r) {
            
            if (isset($_GET['s']) && is_numeric($_GET['s'])) {
                $start = $_GET['s'];
            }
            
            if (isset($_GET['p']) && is_numeric($_GET['p'])) {
                $pages = $_GET['p'];
            }
            
            if (isset($_GET['sort'])) {
                $sort = $_GET['sort'];
            }
            
            
            if ($pages >= 1) {
                $current_page = ($start/$display) + 1;// find current page by dividing the amount of results aready searched by the amount wanted to display

                if ($current_page != 1) {//if it isn't the first page
                    echo '<a href="netflix.php?s=' . ($start - $display) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '"><br/>Previous </a>';

                } else {
                    echo '<br/>Previous ';//not linked so can't clicked
                }

                for ($i = 1; $i <= $pages; $i++) {//for all the pages it'll make links
                    if ($i != $current_page) {
                        echo '<a href="netflix.php?s=' . (($display *($i - 1))) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '">' . $i . ' </a>';
                    } else {
                        echo $i . ' ';//not linked so can't clicked
                    }

                }

                if ($current_page != $pages) {//is it isn't the last page
                    echo '<a href="netflix.php?s=' . ($start + $display) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '"> Next</a>';

                } else {
                    echo ' Next';//not linked so can't clicked
                }
            
            }
            
            echo "<table><tr>
                    <th>Edit</th>
                    <th>Delete</th>
                    <th><a href='netflix.php?s=$start&p=$pages&t=$search&sort=idsort'>ID</a></th>
                    <th><a href='netflix.php?s=$start&p=$pages&t=$search&sort=title'>Movie Title</a></th>
                    <th style='width: 10%;' ><a href='netflix.php?s=$start&p=$pages&t=$search&sort=rate'>Rating</a></th>
                    <th style='width: 40%;' ><a href='netflix.php?s=$start&p=$pages&t=$search&sort=ratelev'>Rating Level</a></th>
                    <th><a href='netflix.php?s=$start&p=$pages&t=$search&sort=ry'>Release Year</a></th></tr>";
            while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { //while there is data
                echo "<tr><td> <a class='buttons' href='editpage.php?id=" . $row['ID'] . "'> edit </a> </td><td> <a class='buttons' href='deletepage.php?id=" . $row['ID'] . "'> delete</a> </td><td>" . $row['ID'] . "</td><td>" . $row['title'] . "</td><td>" . $row['rating'] . "</td><td>" . $row['ratingLevel'] . "</td><td>" . $row['release year'] . "</td></tr>";//table rows and data put into table
            }
            echo "</table>";
            
            
            if ($pages >= 1) {
                $current_page = ($start/$display) + 1;// find current page by dividing the amount of results aready searched by the amount wanted to display

                
                
                if ($current_page != 1) {//if it isn't the first page
                    echo '<a href="netflix.php?s=' . ($start - $display) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '"><br/>Previous </a>';

                } else {
                    echo '<br/>Previous ';//not linked so can't clicked
                }

                for ($i = 1; $i <= $pages; $i++) {//for all the pages it'll make links
                    if ($i != $current_page) {
                        echo '<a href="netflix.php?s=' . (($display *($i - 1))) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '">' . $i . ' </a>';
                    } else {
                        echo $i . ' ';//not linked so can't clicked
                    }

                }

                if ($current_page != $pages) {//is it isn't the last page
                    echo '<a href="netflix.php?s=' . ($start + $display) . '&p=' . $pages . '&t=' . $search . '&sort=' . $sort . '"> Next</a>';

                } else {
                    echo ' Next';//not linked so can't clicked
                }
            
            }
            
        } else {
            echo mysqli_error($dbc);
        }
                   
        
          
       
        
        
        
        ?>
    
    </body>
    
</html>







































