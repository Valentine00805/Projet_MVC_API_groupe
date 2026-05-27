<!-- définition de l'en-tête de la page HTML --> 
<!DOCTYPE html> 
<html lang="fr"> 
<head>
    <title>Liste des étudiants</title> 
    <style>
        table {
            border-collapse: collapse;
        }

        table td, table th {
            border: 1px solid black;
            padding: 3px 5px;
        }
        th, td {
            white-space: nowrap;
        }
    </style>
</head> 
<body> 
    <?php require_once "vue/menu.php"; ?>
    <?php
    function afficherStatut($valeur) {
        $couleur = ($valeur == "Ouvert") ? "green" : "red";
        echo "<span style='color:" . $couleur . ";'>" . $valeur . "</span>";
    }
    ?>
    <!-- mise en place du tableau --> 
     <center><img src="img/Logo.jpg" alt="logo" width="300" height="200"></center>
     <center>
        <p>Horaire et jour sur lesquelles les activités sont possibles : </p>
    <table border> 
        <!-- mise en place de la ligne de titre --> 
        <tr> 
            <th> </th>
            <th>Lundi</th> 
            <th>Mardi</th> 
            <th>Mercredi</th> 
            <th>Jeudi</th> 
            <th>Vendredi</th> 
            <th>Samedi</th> 
            <th>Dimanche</th> 
        </tr>
        
        <!-- affichage de chacune des lignes du tableau --> 
        <?php foreach ($listeHoraires as $unHoraire): ?>
        <tr> 
            <td><strong><?php echo $unHoraire["horaire"]; ?></strong></td> 
            <td><?php afficherStatut($unHoraire["lundi"]); ?></td>
            <td><?php afficherStatut($unHoraire["mardi"]); ?></td>
            <td><?php afficherStatut($unHoraire["mercredi"]); ?></td>
            <td><?php afficherStatut($unHoraire["jeudi"]); ?></td>
            <td><?php afficherStatut($unHoraire["vendredi"]); ?></td>
            <td><?php afficherStatut($unHoraire["samedi"]); ?></td>
            <td><?php afficherStatut($unHoraire["dimanche"]); ?></td>
            
        </tr> 
        <?php endforeach; ?> 
    </table> 
        </center>
    <br>
    <?php require "menu_mention_legal.php";?>
</body> 
</html>
