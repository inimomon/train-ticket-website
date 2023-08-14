<?php 
include 'logic.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dataPemakai = login($_POST);
}
?>

<?php 
require_once 'navbar.php';
?>

<form action="" method="POST">
    <div><input type="text" name="username"></div>
    <div><input type="password" name="password"></div>

    <div><button type="submit">Submit</button></div>
</form>

<?php 
require_once 'footer.php';
?>