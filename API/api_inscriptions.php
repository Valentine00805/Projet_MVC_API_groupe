<?php
// Connexion à la base de données
include("db_connect.php");

$request_method = $_SERVER["REQUEST_METHOD"];

switch($request_method)
{
    case 'POST':
        // Ajouter une inscription
        addInscription();
        break;

    default:
        header("HTTP/1.0 405 Method Not Allowed");
        break;
}


function addInscription()
{
    global $conn;
    $nom           = $_POST["nom"];
    $prenom        = $_POST["prenom"];
    $dateNaissance = $_POST["dateNaissance"];
    $email         = $_POST["email"];
    $telephone     = $_POST["telephone"];
    $adresse       = $_POST["adresse"];
    $ida           = intval($_POST["ida"]);

    $query = "INSERT INTO inscription (nom, prenom, dateNaissance, email, telephone, adresse, ida)
              VALUES('" . $nom . "', '" . $prenom . "', '" . $dateNaissance . "', '" . $email . "', '" . $telephone . "', '" . $adresse . "', " . $ida . ")";

    $conn->query("SET NAMES utf8");
    if($conn->query($query))
    {
        $response = array(
            'status'         => 1,
            'status_message' => 'Inscription enregistrée avec succès.'
        );
    }
    else
    {
        $response = array(
            'status'         => 0,
            'status_message' => 'Activité complète ou erreur lors de l\'inscription.'
        );
    }
    header('Content-Type: application/json');
    echo json_encode($response);
}
?>
