<?php 
// inclusion du modèle 
require_once "modele/modeleEtudiants.php";
// inclusion des contrôleurs 
require_once "controleur/controleurs.php";
// lancement du bon contrôleur 
if ( empty($_GET["action"]) ) 
    // cas de la consultation : écran de départ 
    consultHoraire();
else     
    if ( $_GET["action"] == 'MED') 
        // cas de la page des médicaments
        medicament();
    else
        if ( $_GET["action"] == 'ACTIVITE') 
            // cas de la page des activités
            activite();
        else 
            if ( $_GET["action"] == 'FORMULAIRE')
                // cas du formulaire d'inscription
                chargementFormInscription();
            else
                if ( $_GET["action"] == 'MENTION_LEGAL') 
                // cas de la page de mention légal
                mentionLegal();
?>
