<!DOCTYPE html>
<html>
    <head>
        <title>Le formulaire d'inscription</title>
    </head>
    <body>
        <?php
        require_once "vue/menu.php";

        // Récupération des paramètres passés en GET depuis Activites.php
        $ida          = isset($_GET['id'])   ? intval($_GET['id'])                    : 0;
        $nomActivite  = isset($_GET['name']) ? htmlspecialchars($_GET['name'])         : 'Non spécifiée';

        // Traitement du formulaire soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST")
        {
            $urlApiInscriptions = "http://127.0.0.1/Projet_MVC_API_groupe/API/api_inscriptions.php";

            $data = array(
                'nom'           => $_POST["nom"],
                'prenom'        => $_POST["prenom"],
                'dateNaissance' => $_POST["dateNaissance"],
                'email'         => $_POST["email"],
                'telephone'     => $_POST["telephone"],
                'adresse'       => $_POST["adresse"],
                'ida'           => intval($_POST["ida"])
            );

            $options = array(
                'http' => array(
                    'header'  => "Content-Type: application/x-www-form-urlencoded\r\n",
                    'method'  => 'POST',
                    'content' => http_build_query($data)
                )
            );

            $context  = stream_context_create($options);
            $resultat = json_decode(file_get_contents($urlApiInscriptions, false, $context), true);

            if ($resultat['status'] === 1)
            {
                header("Location: Formulaire_inscription.php?id=" . $ida . "&name=" . urlencode($nomActivite) . "&success=1");
                exit();
            }
            else
            {
                header("Location: Formulaire_inscription.php?id=" . $ida . "&name=" . urlencode($nomActivite) . "&error=1");
                exit();
            }
        }
        ?>

        <!-- Message de succès ou d'erreur -->
        <?php if (isset($_GET['success']) && $_GET['success'] == 1): ?>
            <div style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #c3e6cb;">
                <strong>Succès !</strong> Votre inscription a été enregistrée avec succès.
            </div>
        <?php elseif (isset($_GET['error']) && $_GET['error'] == 1): ?>
            <div style="background-color: #f8d7da; color: #842029; padding: 10px; border-radius: 4px; margin-bottom: 15px; border: 1px solid #f5c2c7;">
                <strong>Erreur :</strong> Vous devez sélectionner une activité valide avant de vous inscrire.
            </div>
        <?php endif; ?>

        <form action="index.php?action=FORMULAIRE&id=<?php echo $ida; ?>&name=<?php echo urlencode($nomActivite); ?>" method="post">
            <fieldset>
                <legend><strong>Formulaire d'inscription : </strong></legend>

                <!-- Champ caché pour l'id de l'activité -->
                <input type="hidden" name="ida" value="<?php echo $ida; ?>">

                <!-- Affichage de l'activité sélectionnée -->
                <?php if ($ida > 0): ?>
                    <p style="background-color: #e3f2fd; padding: 10px; border-radius: 4px; margin-bottom: 15px;">
                        <strong>Activité sélectionnée : </strong><?php echo $nomActivite; ?>
                    </p>
                <?php endif; ?>

                <div>
                    <ul>
                        <li>
                            <label for="nom">Nom</label>
                            <textarea id="nom" name="nom" placeholder="Champ à remplir"></textarea><br>
                        </li>
                        <li>
                            <label for="prenom">Prénom</label>
                            <textarea id="prenom" name="prenom" placeholder="Champ à remplir"></textarea><br>
                        </li>
                        <li>
                            <label for="dateNaissance">Date de naissance :</label>
                            <input type="date" id="dateNaissance" name="dateNaissance">
                        </li>
                        <li>
                            <label for="email">Email :</label>
                            <input type="email" id="email" name="email" placeholder="Entrez votre email"><br><br>
                        </li>
                        <li>
                            <label for="telephone">Téléphone :</label>
                            <input type="tel" id="telephone" name="telephone" placeholder="Entrez votre téléphone"><br><br>
                        </li>
                        <li>
                            <label for="adresse">Adresse :</label>
                            <textarea id="adresse" name="adresse" placeholder="Champ à remplir"></textarea><br>
                        </li>
                        <li>
                            <label for="activite-selected"><strong>Activité sélectionnée :</strong></label>
                            <div id="activite-selected" style="background-color: #f0f0f0; padding: 10px; border-radius: 4px; border-left: 4px solid #d4337d; margin-top: 5px;">
                                <strong><?php echo $nomActivite; ?></strong>
                            </div>
                        </li>
                    </ul>
                </div>

                <center><input type="submit" name="actionIns" value="S'inscrire"></center>
            </fieldset>
        </form>
    </body>
    <footer>
        <br><br>
        <?php require_once "vue/menu_mention_legal.php"; ?>
    </footer>
</html>
