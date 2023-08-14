<?php 
$koneksi = new mysqli('localhost','root','','uh1');

if($koneksi->connect_errno) {
    die ("Koneksi Error: " .$koneksi->connect_error);
}
?>