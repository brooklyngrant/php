<?php 
    
    ini_set('display_errors', 1);
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
         require_once("/home/brooklyng/etc/sqli_connect.php");
         
         function check_login($dbc, $user = '', $pass = '') {
             $errors = [];
             if (empty($user)) {
                 $errors[] = 'You forgot to enter your username.';
             } else {
                 $u = mysqli_real_escape_string($dbc, trim($user));
             }
             
             if (empty($pass)) {
                 $errors[] = 'You forgot to enter your password.';
             } else {
                 $p = mysqli_real_escape_string($dbc, trim($pass));
             }
             
             if (empty($errors)) {
                 $q = "SELECT username FROM users WHERE username ='$u' AND password =SHA2('$p', 512)";
                 $r = @mysqli_query($dbc, $q);
                 if(mysqli_num_rows($r) == 1) {
                     // get information - logs in
                     
                     $row = mysqli_fetch_array($r, MYSQLI_ASSOC);
                     session_start();
                     $_SESSION['user'] = $row['username'];
                     header('Location: netflix.php');
                     exit();
                     
                     
                 } else {
                     $errors[] = "Username and Password not found";
                     
                 }
                 
                 
             }
             
             foreach ($errors as $e) {
                 echo " - $e<br>\n";
             }
         }
         
         check_login($dbc, $_POST['user'], $_POST['pass']);
         
     }


?>

<!doctype html>


<html>
    <head>
        <title>Log in</title>
        <meta charset="utf-8">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="loginstyle.css">
    
    </head>
    
    <body id="login">
        
        
        <form action="login_new.php" method="post">
            <div id="div">
                <h1>Login</h1>
                <input placeholder="Username" type="text" name="user" maxlength="20" /> <br/>
                <input placeholder="Password" type="password" name="pass" maxlength="20" /> <br/>
                <input type="submit" name="submit" value="Login">
            </div>
        
        </form>
        
        
        
        
    </body>
</html>