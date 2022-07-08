<?php
session_start();
// Destroy session
if (session_destroy()) {
    // Redirecting To Home Page
    header("Location: http://localhost:80/mondoswbd/login.php/");
}
