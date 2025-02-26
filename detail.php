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

$fmt = numfmt_create( 'fr_FR', NumberFormatter::CURRENCY );


$myCom = "";
foreach ($avisText as $value) {

    if ($value["pro_id"] == 10) {
        $star = "";
        for ($i = 0; $i < $value["avi_note"]; $i++) {
            $star .= "<i class='fa-solid fa-star text-warning'></i>";
        }
        $theDate = new DateTimeImmutable($value["avi_date"]);
        $myCom .= "
                <h2 class='fs-4'>" . $value["avi_note"] . "/5 <span class='text-secondary fs-6'>" . $theDate->format('d/m/Y') . "</span> $star</h2>
                <p>" . $value["avi_texte"] . "</p>
    ";
    }

}


foreach ($categorie as $value) {
    if ($value["pro_id"] == 9) {
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
</head>

<body class="row m-0 justify-content-center">

<nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="./accueil.php">SaïNiel</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="./accueil.php">Accueil</a>
                    </li>
                </ul>
                <div class="border me-3 p-2">
                    <a class="nav-link active" aria-current="page" href="./utilisateur.php"><i
                            class="fa-solid fa-user"> Utilisateur</i></a>
                </div>
            </div>
        </div>
    </nav>

    <img src="<?= './Assets/images/' . $produits[9]["pro_image"] ?>" alt="Image d'une <?= $produits[9]["pro_nom"] ?>"
        class="col-7 mt-5">
    <h1 class="text-center"><?= $produits[9]["pro_nom"] ?></h1>
    <div class="col-7">
        <h2 class="text-center"><?= $produits[9]["pro_description"] ?> !!!</h2>
        <div class="row text-center gap-1 mb-1">
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-file"></i> Référence :
                <?= $produits[9]["pro_reference"] ?>
            </p>
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-gears"></i> Cylindre Moteur :
                <?= $produits[9]["cylindree_moteur"] ?>
            <p class="p-0 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-truck"></i> Quantité :
                <?= $produits[9]["pro_quantite"] ?> </p>
        </div>
        <div class="row text-center gap-1 mb-1">
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-calendar"></i> Année de sortie
                : <?= $date->format('Y') ?>
            </p>
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-tag"></i> Prix :
                <?= numfmt_format_currency($fmt,$produits[9]["pro_prix"], "EUR") ?></p>
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-car"></i> Boîte :
                <?= $produits[9]["type_vehicule"] ?>
            </p>
        </div>
        <div class="row text-center">
            <p class="ps-3 m-0 col border border-dark rounded-pill"><i class="fa-solid fa-car-side"></i> Type :
                <?= $type ?>
            </p>
        </div>
    </div>

    <h2 class="text-center mt-4" id="note">Notes <?= $avis[0]["avg(avi_note)"] ?>/5</h2>


    <!-- Button trigger modal -->
    <button type="button" class="btn btn-outline-secondary col-3 mb-3" data-bs-toggle="modal"
        data-bs-target="#exampleModal">
        Obtenir tous les avis sur ce produit
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel"><?= $produits[9]["pro_nom"] ?></h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $myCom ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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