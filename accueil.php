<?php

$data = file_get_contents("./Assets/json/produits.json");
$json = json_decode($data, true);

function getProducts()
{
    $myCards = "";
    $data = file_get_contents("./Assets/json/produits.json");
    $json = json_decode($data, true);
    foreach ($json as $key => $value) {
        $date = new DateTimeImmutable($value["date_sortie"]);
        $myCards .= "
                    <div class='col-3'>
                <img src='Assets/images/" . $value["pro_image"] . "' alt='Image de" . $value["pro_nom"] . "'>
                <h2 class='fs-6'>" . $value["pro_nom"] . "</h2>
                <button class='btn info'><a class='text-decoration-none text-light' href='detail.php'>+ d'Info</a></button>
            </div>
        ";
    }
    return $myCards;
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voitures</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./Assets/css/style.css">
</head>

<body>

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

    <div class="row m-0 justify-content-center pt-4 px-2" id="Accueil">
        <div class="col-6 text-light d-flex flex-column justify-content-center">
            <h1><?= $json[9]["pro_nom"] ?></h1>
            <p>La Tesla Model 3 est une berline électrique alliant performance, autonomie et technologie
                avancée. Avec une
                autonomie pouvant atteindre 600 km, elle se recharge rapidement via le réseau de Superchargeurs Tesla.
                Son
                Autopilot offre une conduite assistée intelligente, améliorée par des mises à jour régulières. Grâce à
                sa
                puissance et son accélération fulgurante, elle assure une conduite dynamique et fluide. Son intérieur
                minimaliste, dominé par un écran tactile de 15 pouces, offre confort et connectivité. Écologique et
                économique, la Model 3 est idéale pour ceux qui recherchent innovation et efficacité au quotidien.</p>
            <p class="d-flex justify-content-end gap-1">
                <span class="border border-3 rounded-circle p-2"><i class="fa-solid fa-charging-station"></i></span>
                <span class="border border-3 rounded-circle p-2"><i class="fa-solid fa-car"></i></span>
                <span class="border border-3 rounded-circle p-2"><i class="fa-regular fa-comment"></i></span>
            </p>
        </div>
        <img src="./Assets/images/<?= $json[9]["pro_image"] ?>" alt="Image d'une tesla model 3"
            class="col-6 rounded-circle fond">
    </div>

    <div class="mb-5" id="card">
        <div class="row px-5 mx-auto pt-4" id="card-content">
            <?= getProducts() ?>
        </div>
    </div>


    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>