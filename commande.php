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

?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commande</title>
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
</body>

</html>