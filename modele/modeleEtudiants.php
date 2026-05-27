<?php

$urlApiHoraires = "https://vallaurap.com/Projet_MVC_API/API/api_horaires.php";
$urlApiMedicaments = "https://vallaurap.com/Projet_MVC_API/API/api_medicaments.php";
$urlApiInscriptions = "https://vallaurap.com/Projet_MVC_API/API/api_inscriptions.php";
$urlApiActivites = "https://vallaurap.com/Projet_MVC_API/API/api_activites.php";
 
// -----------------------------------------------
// Récupérer tous les horaires
// -----------------------------------------------
function getHoraires()
{
    global $urlApiHoraires;
 
    $options = array(
        'http' => array(
            'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method' => 'GET'
        )
    );
 
    $context       = stream_context_create($options);
    $listeHoraires = file_get_contents($urlApiHoraires, false, $context);
 
    return json_decode($listeHoraires, true);
}

// -----------------------------------------------
// Récupérer tous les medicaments
// -----------------------------------------------
// Appel de l'API pour récupérer tous les médicaments
function getMedicaments()
{
        global $urlApiMedicaments;

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'GET'
            )
        );
        $context          = stream_context_create($options);
        $listeMedicaments = file_get_contents($urlApiMedicaments, false, $context);
        $listeMedicaments = json_decode($listeMedicaments, true);

        return $listeMedicaments;
}
// -----------------------------------------------
// Récupérer toutes les activités
// -----------------------------------------------
function getActivites()
{
        global $urlApiActivites;

        $options = array(
            'http' => array(
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'GET'
            )
        );
        $context          = stream_context_create($options);
        $listeActivites = file_get_contents($urlApiActivites, false, $context);
        $listeActivites = json_decode($listeActivites, true);

        return $listeActivites;
}

// -----------------------------------------------
// Ajouter une inscription
// -----------------------------------------------
function insInscription($nomInscrit, $prenomInscrit, $dateNaissance, $emailInscrit, $telephone, $adresse, $idaInscrit)
{
    global $urlApiInscriptions;

    $data = array(
        'nom'           => $nomInscrit,
        'prenom'        => $prenomInscrit,
        'dateNaissance' => $dateNaissance,
        'email'         => $emailInscrit,
        'telephone'     => $telephone,
        'adresse'       => $adresse,
        'ida'           => $idaInscrit
    );

    $options = array(
        'http' => array(
            'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
        )
    );

    $context = stream_context_create($options);
    $result  = file_get_contents($urlApiInscriptions, false, $context);

    return json_decode($result, true);
}

?>
