<?php
// Connexion à la base de données
include("db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Récupérer tous les horaires
        getHoraires();
        break;
        
    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

//Fonctions pour récupérer les horaires
function getHoraires()
{
    global $conn;
    $query    = "SELECT * FROM horaires";
    $response = array();
    $conn->query("SET NAMES utf8");
    $result = $conn->query($query);
    while ( $row = $result->fetch(PDO::FETCH_ASSOC) )
    {
        $response[] = $row;
    }
    $result->closeCursor();
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>
