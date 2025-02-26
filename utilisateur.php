<?php

$data = file_get_contents("./Assets/json/commandes.json");
$json = json_decode($data, true);

foreach ($json[1] as $value) {
    $date = new DateTimeImmutable($json[1]["com_date"]);
    $userInfo = "
                    <p><span class='fw-bold'>Nom</span> : " . $json[1]["uti_name"] . "</p>
                    <p><span class='fw-bold'>Mail</span> : " . $json[1]["uti_mail"] . "</p>
                    <p><span class='fw-bold'>Mot de passe</span> : " . $json[1]["uti_mdp"] . "</p>
                    <p><span class='fw-bold'>Téléphone</span> : " . $json[1]["uti_telephone"] . "</p>
                    <p><span class='fw-bold'>Date d'inscription</span> : " . $date->format("d/m/Y") . "</p>";
}

$fmt = numfmt_create('fr_FR', NumberFormatter::CURRENCY);


$data1 = file_get_contents("./Assets/json/produits_commande.json");
$commande = json_decode($data1, true);
$myCommande = "";

foreach ($commande as $value) {
    $date = new DateTimeImmutable($value["date_sortie"]);
    if ($value["uti_id"] == 2) {
        $myCommande .= "
                            <div class='col-4'>
            <p class='mb-3 text-uppercase fw-bold'><var> " . $value["pro_nom"] . "</var></p>
            <div class='row'>
                <div class='mb-3 col-lg-7 col-10'>
                    <img src='./Assets/images/" . $value["pro_image"] . "' class='card-img-top'
                        alt='Image de" . $value["pro_nom"] . "'>
                </div>
                <div class='card-body col-lg-3 col-10'>
                    <p class='card-text m-0'>" . $value["energie"] . "</p>
                    <p class='card-text m-0'><span class='fw-bold text-decoration-underline'>Année</span> : " .
            $date->format('Y') . " </p>
                    <p class='card-text m-0'><span class='fw-bold text-decoration-underline'>Boîte</span> : " .
            $value["type_vehicule"] . "</p>
                    <p class='card-text m-0'><span class='fw-bold text-decoration-underline'>Prix</span> : " .
            numfmt_format_currency($fmt, $value["pro_prix"], "EUR") . "</p>
                </div>
            </div>
        </div>
        ";
    }
}

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateurs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>


<body>

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
                    <a class="nav-link active" aria-current="page" href="./utilisateur.php"><i class="fa-solid fa-user">
                            Utilisateur</i></a>
                </div>
            </div>
        </div>
    </nav>

    <div class="mx-5 my-3 text-center border">
        <?= $userInfo ?>
    </div>

    <div class="row shadow p-3 m-0 mb-5 bg-body-tertiary rounded">
        <h1><var>1<sup>ère</sup> Commande</var></h1>
        <?= $myCommande ?>
        <a href='./commande.php' class='text-decoration-none col-4 text-center align-content-center'>Voir la commande <i
                class='fa-solid fa-chevron-right'></i></a>
    </div>



    <script src="https://kit.fontawesome.com/50a1934b21.js" crossorigin="anonymous"></script>
</body>

</html>