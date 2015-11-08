<?php 

session_start();

// empty the array
unset($_SESSION['actions']);

// redirect back to homepage
header('Location: index.php');

?>