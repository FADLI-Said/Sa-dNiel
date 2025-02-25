<?php

function getProducts()
{
    $myCards = "";
    $data = file_get_contents("./Assets/json/produits.json");
    $json = json_decode($data, true);
    foreach ($json as $key => $value) {
        $date = new DateTimeImmutable($value["date_sortie"]);
        $myCards .= "<a class='m-4 p-2 max col-3 text-decoration-none'>
                    <div class='card shadow p-3 mb-5 bg-body-tertiary rounded'>
        <p class='mb-3 text-uppercase'> " . $value["pro_nom"] . "</p>
        <div class='row'>
            <div class='mb-3 col-7'>
                <img src='./Assets/images/" . $value["pro_image"] . "' class='card-img-top'
                    alt='...'>
            </div>
            <div class='card-body col-3'>
                <p class='card-text m-0 text-decoration-underline'><span class='fw-bold'>Énergie : </span>" . $value["energie"] . "</p>
                <p class='card-text m-0 text-decoration-underline'><span class='fw-bold'>Année : </span>". $date->format('Y') . "  </p>
                <p class='card-text m-0 text-decoration-underline'><span class='fw-bold'>Boîte : </span>" . $value["type_vehicule"] . "</p>
                <p class='card-text m-0 text-decoration-underline'><span class='fw-bold'>Prix : </span>" . $value["pro_prix"] . " €</p>
            </div>
        </div>
    </div>
    </a>
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

<body class="row justify-content-center m-0">
    <h1 class="text-center">Concessionnaire : SaïNiel</h1>
    <?= getProducts() ?>



    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>