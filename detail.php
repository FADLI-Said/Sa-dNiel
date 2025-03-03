<?php

$data = file_get_contents("./Assets/json/produits.json");
$produits = json_decode($data, true);

$data2 = file_get_contents("./Assets/json/avis.json");
$avis = json_decode($data2, true);

$data3 = file_get_contents("./Assets/json/avis_produit.json");
$avisText = json_decode($data3, true);

$data4 = file_get_contents("./Assets/json/categorie.json");
$categorie = json_decode($data4, true);

$date = new DateTimeImmutable($produits[9]["date_sortie"]);
$date->format('Y');

$fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);


$myCom = "";
foreach ($avisText as $value) {

    if ($value["pro_id"] == 11) {
        $star = "";
        for ($i = 0; $i < $value["avi_note"]; $i++) {
            $star .= "<i class='fa-solid fa-star text-warning'></i>";
        }
        $theDate = new DateTimeImmutable($value["avi_date"]);
        $myCom .= "
                <h2 class='fs-4'>" . $value["avi_note"] . "/5 <span class='fs-6'>" . $theDate->format('d/m/Y') . "</span> $star</h2>
                <p>" . $value["avi_texte"] . "</p>
    ";
    }

}


foreach ($categorie as $value) {
    if ($value["pro_id"] == 10) {
        $type = $value["cat_nom"];
    }
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="Assets\css\style.css">
</head>

<body class="row m-0 justify-content-center" id="detail">

    <nav class="navbar navbar-expand-lg text-light">
        <div class="container-fluid">
            <a class="navbar-brand text-light" href="./accueil.php">SaïNiel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active text-light" aria-current="page" href="./accueil.php">Accueil</a>
                    </li>
                </ul>
                <div class="border me-3 p-2">
                <a class="nav-link active" aria-current="page" href="./utilisateur.php"><i class="fa-solid fa-user me-2">
                </i>Utilisateur</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container row" id="info">
        <img src="<?= './Assets/images/' . $produits[10]["pro_image"] ?>"
            alt="Image d'une <?= $produits[10]["pro_nom"] ?>" class="col-5 mt-5">

        <div class="col-6 text-light mt-5">
            <h1 class="text-center"><?= $produits[10]["pro_nom"] ?></h1>
            <p class="text-center"><?= $produits[10]["pro_description"] ?></p>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-file"></i> Référence :
                    <?= $produits[10]["pro_reference"] ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-gears"></i> Cylindre
                    Moteur :
                    <?= $produits[10]["cylindree_moteur"] ?>
                <p class="p-0 m-0 col border border-light rounded-pill"><i class="fa-solid fa-truck"></i> Quantité :
                    <?= $produits[10]["pro_quantite"] ?>
                </p>
            </div>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-calendar"></i> Année de
                    sortie
                    : <?= $date->format('Y') ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-tag"></i> Prix :
                    <?= numfmt_format_currency($fmt, $produits[10]["pro_prix"], "EUR") ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car"></i> Boîte :
                    <?= $produits[10]["type_vehicule"] ?>
                </p>
            </div>
            <div class="row text-center">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car-side"></i> Type :
                    <?= $type ?>
                </p>
            </div>

            <h2 class="text-center mt-4">Notes <?= $avis[4]["avg(avi_note)"] ?>/5</h2>


            <!-- Button trigger modal -->
            <button type="button" class="btn col-3 mb-3 text-light" data-bs-toggle="modal"
                data-bs-target="#exampleModal" id="note">
                Obtenir tous les avis sur ce produit
            </button>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $produits[10]["pro_nom"] ?></h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <?= $myCom ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn text-light" data-bs-dismiss="modal" id="close">Fermer</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>