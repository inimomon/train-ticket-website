<?php 
require 'logic.php';
$id = $_GET['id'];

delete($id);

header("location:display.php");

?>