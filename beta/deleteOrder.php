<?php 

session_start();

// get the order requested for deletion
$orderId = $_GET['id'];

unset($_SESSION['actions'][$orderId]);

// re-arrange order array
$_SESSION['actions'] = array_values($_SESSION['actions']);

// redirect back to homepage
header('Location: index.php');

?>