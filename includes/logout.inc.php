<?php
    session_start();
    session_unset();                        // removes all session variables
    session_destroy();                      // destroy the session
    header("Location: ../index.php");       // Brings the user that has logged out back to the index.php page
?>