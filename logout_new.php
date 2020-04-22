<?php

session_start();
if (!isset($_SESSION['user'])) {
    header('Location: login_new.php');
} else {
    $_SESSION = [];
    session_destroy();
    header('Location: login_new.php');
}

?>