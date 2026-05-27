<?php 

function consultHoraire()
{ 
    // recherche des horaires : appel de la fonction getHoraires du modèle 
    $listeHoraires = getHoraires();
    // inclusion du fichier d'affichage de la vue 
    require_once "vue/Accueil.php";
} 

function medicament()
{
    $listeMedicaments = getMedicaments();
    // inclusion du fichier d'affichage de la page de médicaments
    require_once "vue/Medicaments.php";
}

function activite()
{ 
    $listeActivites = getActivites();
    // inclusion du fichier d'affichage de la page des activités
    require_once "vue/Activites.php";
}

function chargementFormInscription()
{
    // récupération des paramètres de l'activité
    $ida         = isset($_GET['id'])   ? intval($_GET['id'])             : 0;
    $nomActivite = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Non spécifiée';

    // si le formulaire est soumis, on envoie les données à l'API
    if ($_SERVER["REQUEST_METHOD"] === "POST")
    {
        // récupération des données (champs) du formulaire
        $nomInscrit      = $_POST["nom"];
        $prenomInscrit   = $_POST["prenom"];
        $dateNaissance   = $_POST["dateNaissance"];
        $emailInscrit    = $_POST["email"];
        $telephone       = $_POST["telephone"];
        $adresse         = $_POST["adresse"];
        $idaInscrit      = intval($_POST["ida"]);

        // ajout de l'inscription : appel de l'API inscriptions
        $resultat = insInscription($nomInscrit, $prenomInscrit, $dateNaissance, $emailInscrit, $telephone, $adresse, $idaInscrit);

        // redirection selon le résultat
        if ($resultat['status'] === 1)
            header("Location: Index.php?action=FORMULAIRE&id=" . $ida . "&name=" . urlencode($nomActivite) . "&success=1");
        else
            header("Location: Index.php?action=FORMULAIRE&id=" . $ida . "&name=" . urlencode($nomActivite) . "&error=1");
        exit();
    }

    // inclusion du formulaire d'inscription de la vue
    require_once "vue/Formulaire_inscription.php";
}

function mentionLegal()
{ 
    // inclusion du fichier d'affichage de la page de mention légal
    require_once "vue/mention_legal.php";
}
?>
