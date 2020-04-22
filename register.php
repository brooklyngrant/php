<?php # Script 9.5 - register.php #2
    // This script performs an INSERT query to add a record to the users table.
    
    
    session_start();
    if (!isset($_SESSION['user'])) {
        header('Location: login_new.php');
    }
        
    ini_set('display_errors', 1); 
        
    // Check for form submission:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        require_once("/home/brooklyng/etc/sqli_connect.php");

        $errors = []; // Initialize an error array.

        // Check for a username:
        if (empty($_POST['username'])) {
            $errors[] = 'You forgot to enter your username.';
        } else {
            $un = mysqli_real_escape_string($dbc, trim($_POST['username']));
        }
        

        // Check for an email address:
        if (empty($_POST['email'])) {
            $errors[] = 'You forgot to enter your email address.';
        } else {
            $e = mysqli_real_escape_string($dbc, trim($_POST['email']));
        }

        // Check for a password and match against the confirmed password:
        if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                $errors[] = 'Your password did not match the confirmed password.';
            } else {
                $p = mysqli_real_escape_string($dbc, trim($_POST['pass1']));
            }
        } else {
            $errors[] = 'You forgot to enter your password.';
        }

        if (empty($errors)) { // If everything's OK.

            // Register the user in the database...

            // Make the query:
            $q = "INSERT INTO users (username, password, email) VALUES ('$un', SHA2('$p', 512), '$e')";
            $r = @mysqli_query($dbc, $q); // Run the query.
            if ($r) { // If it ran OK.

                // Print a message:
                echo '<h2>Thank you!</h2>
                <p>You are now registered. </p><p><br></p>';

            } else { // If it did not run OK.

                // Public message:
                echo '<h2>System Error</h2>
                <p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>';

                // Debugging message:
                echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

            } // End of if ($r) IF.


        } else { // Report the errors.

            echo '<h1>Error!</h1>
            <p class="error">The following error(s) occurred:<br>';
            foreach ($errors as $msg) { // Print each error.
                echo " - $msg<br>\n";
            }
            echo '</p><p>Please try again.</p><p><br></p>';

        } // End of if (empty($errors)) IF.


    } // End of the main Submit conditional.
?>

<!doctype html>

<html lang="en">
    
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
        <style type="text/css">
            
        </style>
    </head>
    <body id="register">
        
        <form action="register.php" method="post">
            <div id="div">
                <h1>Register a User</h1>
                <?php 
                $username = $_SESSION['user']; 
                echo "You are logged in as: " . $username. "<br/><br/>";
                ?>
                
                <input placeholder="Username" type="text" name="username" size="15" maxlength="20" value="<?php if (isset($_POST['username'])) echo $_POST['username']; ?>">
                <input placeholder="Email" type="email" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" >
                <input placeholder="Password" type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" >
                <input placeholder="Confirm" type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" >
                <input type="submit" name="submit" value="Register">
                <p><a href="netflix.php">Go to table</a>|<a href="logout_new.php">Logout</a></p>
            </div>
        </form>
        
        
    </body>
</html>
