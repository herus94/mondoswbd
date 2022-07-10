<?php
session_start();
if (session_destroy()) {
    header("Location: http://localhost:80/mondoswbd/login.php/");
}
