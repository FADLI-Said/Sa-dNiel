<?php


$data = file_get_contents("./Assets/json/commandes.json");
$json = json_decode($data, true);

foreach ($json[1] as $value) {
    $date = new DateTimeImmutable($json[1]["com_date"]);
    $userInfo = "
                    <p><span class='fw-bold'>Nom</span> : " . $json[1]["uti_name"] . "</p>
                    <p><span class='fw-bold'>Mail</span> : " . $json[1]["uti_mail"] . "</p>
                    <p><span class='fw-bold'>Téléphone</span> : " . $json[1]["uti_telephone"] . "</p>";
}
// <p><span class='fw-bold'>Date de commande</span> : " . $date->format("d/m/Y") . "</p>";

$data1 = file_get_contents("./Assets/json/produits_commande.json");
$commande = json_decode($data1, true);

foreach ($commande as $value) {
    $date = new DateTimeImmutable($commande[2]["com_date"]);
    if ($value["pro_nom"] == "Toyota Yaris") {
        $userInfo .= "
                    <p><span class='fw-bold'>Date de commande</span> : " . $date->format("d/m/Y") . "</p>";
    }

}

$fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);



$data4 = file_get_contents("./Assets/json/categorie.json");
$categorie = json_decode($data4, true);

foreach ($categorie as $value) {
    if ($value["pro_id"] == 4) {
        $type = $value["cat_nom"];
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
</head>

<body id="detail">

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
                    <a class="nav-link active" aria-current="page" href="./utilisateur.php"><i class="fa-solid fa-user">
                            Utilisateur</i></a>
                </div>
            </div>
        </div>
    </nav>


    <div class="mx-5 my-3 text-center border text-light">
        <?= $userInfo ?>
    </div>

    <div class="row mx-0" id="info">
        <img src="<?= './Assets/images/' . $commande[1]["pro_image"] ?>"
            alt="Image d'une <?= $commande[1]["pro_nom"] ?>" class="col-5 mt-5">

        <div class="col-6 text-light mt-5">
            <h1 class="text-center"><?= $commande[1]["pro_nom"] ?></h1>
            <p class="text-center"><?= $commande[1]["pro_description"] ?></p>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-file"></i> Référence :
                    <?= $commande[1]["pro_reference"] ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-gears"></i> Cylindre
                    Moteur :
                    <?= $commande[1]["cylindree_moteur"] ?>
                <p class="p-0 m-0 col border border-light rounded-pill"><i class="fa-solid fa-truck"></i> Quantité :
                    <?= $commande[1]["pro_quantite"] ?>
                </p>
            </div>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-calendar"></i> Année de
                    sortie
                    : <?= $date->format('Y') ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-tag"></i> Prix :
                    <?= numfmt_format_currency($fmt, $commande[1]["pro_prix"], "EUR") ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car"></i> Boîte :
                    <?= $commande[1]["type_vehicule"] ?>
                </p>
            </div>
            <div class="row text-center">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car-side"></i> Type :
                    <?= $type ?>
                </p>
            </div>
        </div>
    </div>

    <div class="row mx-0" id="info">
        <img src="<?= './Assets/images/' . $commande[2]["pro_image"] ?>"
            alt="Image d'une <?= $commande[2]["pro_nom"] ?>" class="col-5 mt-5">

        <div class="col-6 text-light mt-5">
            <h1 class="text-center"><?= $commande[2]["pro_nom"] ?></h1>
            <p class="text-center"><?= $commande[2]["pro_description"] ?></p>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-file"></i> Référence :
                    <?= $commande[2]["pro_reference"] ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-gears"></i> Cylindre
                    Moteur :
                    <?= $commande[2]["cylindree_moteur"] ?>
                <p class="p-0 m-0 col border border-light rounded-pill"><i class="fa-solid fa-truck"></i> Quantité :
                    <?= $commande[2]["pro_quantite"] ?>
                </p>
            </div>
            <div class="row text-center gap-1 mb-1">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-calendar"></i> Année de
                    sortie
                    : <?= $date->format('Y') ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-tag"></i> Prix :
                    <?= numfmt_format_currency($fmt, $commande[2]["pro_prix"], "EUR") ?>
                </p>
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car"></i> Boîte :
                    <?= $commande[2]["type_vehicule"] ?>
                </p>
            </div>
            <div class="row text-center">
                <p class="ps-3 m-0 col border border-light rounded-pill"><i class="fa-solid fa-car-side"></i> Type :
                    <?= $type ?>
                </p>
            </div>
        </div>
    </div>

    <h2 class="text-light text-end px-5 mb-5">Total : <?= numfmt_format_currency($fmt, $commande[1]["pro_prix"]+$commande[2]["pro_prix"], "EUR") ?></h2>


    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>