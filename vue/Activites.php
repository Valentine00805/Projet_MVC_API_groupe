<!DOCTYPE html>
<html>
    <head>
        <title>Les activités de GSB</title>
        <style>
            .activites-container {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
                gap: 20px;
                padding: 20px;
                background-color: #f5f5f5;
            }
            .activite-card {
                background: white;
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                transition: transform 0.3s ease;
            }
            .activite-card:hover {
                transform: translateY(-5px);
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            }
            .activite-image {
                width: 100%;
                height: 250px;
                object-fit: cover;
                background-color: #e0e0e0;
            }
            .activite-content {
                padding: 20px;
            }
            .activite-content h2 {
                margin: 0 0 10px 0;
                color: #d4337d;
                font-size: 1.3em;
            }
            .activite-content p {
                margin: 8px 0;
                color: #555;
                font-size: 0.95em;
            }
            .activite-label {
                font-weight: bold;
                color: #333;
            }
            .btn-inscrire {
                display: inline-block;
                margin-top: 15px;
                padding: 10px 20px;
                background-color: #d4337d;
                color: white;
                text-decoration: none;
                border-radius: 4px;
                font-weight: bold;
                transition: background-color 0.3s ease;
            }
            .btn-inscrire:hover {
                background-color: #b8235f;
            }
            .no-activities {
                grid-column: 1 / -1;
                text-align: center;
                padding: 40px;
                color: #999;
            }
        </style>
    </head>
    <body>
        <?php require_once "vue/menu.php"; ?>
        <a action="index.php?action=ACTIVITE"></a>
        <div class="activites-container">
            <?php if (empty($listeActivites)): ?>

                <div class="no-activities">
                    <p>Aucune activité trouvée.</p>
                </div>

            <?php else: ?>

                <?php foreach ($listeActivites as $uneActivite): ?>
                <div class="activite-card">
                    <img src="imgAct/<?php echo htmlspecialchars($uneActivite['image']); ?>"
                         alt="<?php echo htmlspecialchars($uneActivite['nomA']); ?>"
                         class="activite-image"
                         onerror="this.src='imgAct/default.jpg'">
                    <div class="activite-content">
                        <h2><?php echo htmlspecialchars($uneActivite['nomA']); ?></h2>
                        <p><span class="activite-label">Date :</span> <?php echo htmlspecialchars($uneActivite['dateA']); ?></p>
                        <p><span class="activite-label">Lieu :</span> <?php echo htmlspecialchars($uneActivite['lieu']); ?></p>
                        <p><span class="activite-label">Participants :</span> <?php echo htmlspecialchars($uneActivite['nb_participant']); ?></p>
                        <p><span class="activite-label">Description :</span> <?php echo htmlspecialchars($uneActivite['description_activite']); ?></p>
                        <a href="index.php?action=FORMULAIRE&id=<?php echo intval($uneActivite['ida']); ?>&name=<?php echo urlencode($uneActivite['nomA']); ?>"
                           class="btn-inscrire">
                            S'inscrire à cette activité
                        </a>
                    </div>
                </div>
                <?php endforeach; ?>

            <?php endif; ?>
        </div>

    </body>
</html>
