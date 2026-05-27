<?php
// Connexion à la base de données
include("db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Récupérer toutes les activités ou une seule
        if(!empty($_GET["ida"]))
        {
            $ida = intval($_GET["ida"]);
            getActivite($ida);
        }
        else
        {
            getActivites();
        }
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getActivites()
{
    global $conn;
    $query    = "SELECT * FROM activite";
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

function getActivite($ida)
{
    global $conn;
    $query = "SELECT * FROM activite WHERE ida = " . $ida . " LIMIT 1";
    $conn->query("SET NAMES utf8");
    $result   = $conn->query($query);
    $response = array();
    while ( $row = $result->fetch(PDO::FETCH_ASSOC) )
    {
        $response[] = $row;
    }
    header('Content-Type: application/json');
    echo json_encode($response, JSON_PRETTY_PRINT);
}
?>
