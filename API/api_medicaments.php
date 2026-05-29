<?php
// Connexion à la base de données
include("db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'GET':
        // Récupérer tous les médicaments ou un seul
        if(!empty($_GET["idMedicament"]))
        {
            $idMedicament = intval($_GET["idMedicament"]);
            getMedicament($idMedicament);
        }
        else
        {
            getMedicaments();
        }
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}

function getMedicaments()
{
    global $conn;
    $query    = "SELECT * FROM medicaments";
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

function getMedicament($idMedicament)
{
    global $conn;
    $query = "SELECT * FROM medicaments WHERE idMedicament = " . $idMedicament . " LIMIT 1";
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

