<?php
session_start();
$conn = new mysqli('localhost', 'root', '', 'ATS613250026');
if ($conn->connect_error) { die('Koneksi gagal: ' . $conn->connect_error); }

function cek_login() {
    if (!isset($_SESSION['id'])) { header('Location: login.php'); exit; }
}
