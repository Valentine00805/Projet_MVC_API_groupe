<?php
$servername = 'localhost';
$dbname = 'gsb';
$username   = 'root';
$password   = '';

try
{
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die("Erreur de connexion : " . $e->getMessage());
}
?>
