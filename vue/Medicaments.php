<!DOCTYPE html>
<html>
    <head>
        <title>Les médicaments</title>
    </head>
    <body>
        <?php require_once "vue/menu.php"; ?>
        
        <a action="index.php?action=MED"></a>

        <div class="main">
            <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">

                <!--================================
                    MEDICAMENTS START
                =================================-->
                <section id="skills" class="tf__skills_2 pt_50 pb_120 xs_pb_80">
                    <div class="container">
                        <div class="row">
                            <div class="col-xxl-12">
                                <!-- Onglets générés dynamiquement depuis l'API -->
                                <ul class="nav nav-pills mb_30" id="pills-tab" role="tablist">
                                    <?php foreach ($listeMedicaments as $index => $unMedicament): ?>
                                    <li class="nav-item" role="presentation">
                                        <button
                                            class="nav-link <?php echo ($index === 0) ? 'active' : ''; ?>"
                                            id="pills-med-<?php echo $unMedicament['idMedicament']; ?>-tab"
                                            data-bs-toggle="pill"
                                            data-bs-target="#pills-med-<?php echo $unMedicament['idMedicament']; ?>"
                                            type="button"
                                            role="tab"
                                            aria-controls="pills-med-<?php echo $unMedicament['idMedicament']; ?>"
                                            aria-selected="<?php echo ($index === 0) ? 'true' : 'false'; ?>"
                                            <?php echo ($index > 0) ? 'tabindex="-1"' : ''; ?>>
                                            <?php echo $unMedicament['nomMedicament']; ?>
                                        </button>
                                    </li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <!-- Contenu des onglets généré dynamiquement depuis l'API -->
                                <div class="tab-content" id="pills-tabContent">
                                    <?php foreach ($listeMedicaments as $index => $unMedicament): ?>
                                    <div
                                        class="tab-pane fade <?php echo ($index === 0) ? 'active show' : ''; ?>"
                                        id="pills-med-<?php echo $unMedicament['idMedicament']; ?>"
                                        role="tabpanel"
                                        aria-labelledby="pills-med-<?php echo $unMedicament['idMedicament']; ?>-tab"
                                        tabindex="0">

                                        <div class="row education">
                                            <div class="tf__single_skill_2 fade_bottom" data-trigerid="skills"
                                                style="translate: none; rotate: none; scale: none; transform: translate(0px); opacity: 1;">
                                                <!-- Image et titre -->
                                                <table>
                                                    <tr>
                                                        <td style="padding-left:320px;">
                                                            <img src="<?php echo $unMedicament['imageMedicament']; ?>"
                                                                 alt="<?php echo $unMedicament['nomMedicament']; ?>"
                                                                 class="img-fluid" width="200px" height="200px">
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-left:325px;">
                                                            <h2 class="mt-3 mb-0"><?php echo $unMedicament['nomMedicament']; ?></h2>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>

                                            <!-- Section A savoir -->
                                            <div class="row">
                                                <div>
                                                    <details class="resume">
                                                        <summary>A savoir</summary>
                                                        <div class="resume-body">
                                                            <details class="plus">
                                                                <summary>La composition</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['composition']; ?></p>
                                                                </div>
                                                            </details>
                                                            <details class="plus">
                                                                <summary>Les effets thérapeutiques</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['effetsTherapeutiques']; ?></p>
                                                                </div>
                                                            </details>
                                                            <details class="plus">
                                                                <summary>Les effets secondaires</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['effetsSecondaires']; ?></p>
                                                                </div>
                                                            </details>
                                                            <details class="plus">
                                                                <summary>Les interactions avec d'autres médicaments</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['interactions']; ?></p>
                                                                </div>
                                                            </details>
                                                            <details class="plus">
                                                                <summary>Les interdictions</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['interdictions']; ?></p>
                                                                </div>
                                                            </details>
                                                            <details class="plus">
                                                                <summary>Les recommandations</summary>
                                                                <div class="plus-body">
                                                                    <p><?php echo $unMedicament['recommandations']; ?></p>
                                                                </div>
                                                            </details>
                                                        </div>
                                                    </details>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--================================
                    MEDICAMENTS END
                =================================-->

                <!-- Bouton scroll -->
                <!-- <div class="progress" id="toTop" role="button" aria-label="Remonter en haut">
                    <svg class="progress-svg" width="100%" height="100%" viewBox="-1 -1 102 102" aria-hidden="true">
                        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
                              style="transition: stroke-dashoffset 10ms linear; stroke-dasharray: 307.919px; stroke-dashoffset: 307.919px;">
                        </path>
                    </svg>
                    <svg class="progress-chevron" viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M6 14l6-6 6 6" fill="none" stroke="currentColor" stroke-width="2"
                              stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </div> -->
            </div>
        </div>

        <!-- <script src="CSS/plugin.js"></script>
        <script src="CSS/scroll_button.js"></script>
        <script src="CSS/sticky_sidebar.js"></script>
        <script src="CSS/animation.js"></script>
        <script src="CSS/main.js"></script> -->
    </body>
</html>
