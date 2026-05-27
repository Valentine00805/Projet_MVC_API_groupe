<?php
$servername = '127.0.0.1';
$port = 3306;
$dbname = 'u708551159_gsb';
$username   = 'u708551159_Val';
$password   = 'GSB_val2026';

try
{
    $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(Exception $e)
{
    die("Erreur de connexion : " . $e->getMessage());
}
?>
