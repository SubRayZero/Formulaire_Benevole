<?php

require_once 'classe_formulaire_benevole.php';
require_once 'data_base_f1.php';
require_once 'inscription.php';

?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Formulaire Bénévole</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/formulaire.css">
    <link rel="stylesheet" href="../css/administration.css">
    <script src="/javascript/validity.js"></script>


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400..900&display=swap" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Accueil</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="section_formulaire">
        <div class="box_formulaire">
            <div class="box_formulaire_center">
                <form class="form" method="POST" action="evenements.php" onsubmit="checkFormValidity()">

                    <div class="inputboxStorage">
                        <label for="choix_evenement">Choix de l'évenement *</label>
                        <select id="choix_evenement" name="choix_evenement">
                            <option value="personnes_agees">Aide personnes agées</option>
                            <option value="espace_naturelles">Aide espaces naturelles</option>
                            <option value="ventes">Ventes</option>
                            <option value="bricolage">Bricolage</option>
                            <option value="informatique">Informatique</option>
                        </select>
                    </div>

                    <div class="inputboxStorage">
                        <label for="region_admin">Région *</label>
                        <select id="region_admin" name="region_admin" required>
                            <option value="" selected>Veuillez sélectionner votre région</option>
                            <option value="isere">Isère</option>
                            <option value="rhone_alps">Rhône Alpes</option>
                        </select>
                    </div>


                    <div class="inputboxStorage">
                        <label for="description">Description de l'évenement</label>
                        <textarea type="description" name="description" id="description"></textarea>
                    </div>

                    <div class="inputboxStorage">
                        <label for="personne">Choix du bénévole *</label>
                        <select id="personne" name="personne">
                            <?php

                            $new_DbF1 = new DbF1("./benevoles.csv");
                            $csv_benevoles = $new_DbF1->readbenevoles_csv();

                            if ($csv_benevoles !== false) {
                                while (($row_benevoles = fgetcsv($csv_benevoles)) !== false) {
                                    $data_benevoles[] = $row_benevoles;
                                }

                                foreach ($data_benevoles as $row) {
                                    // Afficher chaque ligne
                                    echo ("<option>" . $row[0] .  "</option>");
                                }

                                $new_DbF1->closebenevoles_csv($csv_benevoles);
                            }

                            ?>
                        </select>
                    </div>

                    <input type="submit" value="Suivant" id="inscription" class="button" />
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer_nav_bar">Mentions légales</div>
        <div class="footer_nav_bar">CGU</div>
        <div class="footer_nav_bar">Plan du site</div>
    </footer>
</body>