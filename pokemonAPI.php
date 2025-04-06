<link rel="stylesheet" href="style.css"/>


<div class="cartes2">

<?php
require 'vendor/autoload.php';// charge les librairie & dependance 
use GuzzleHttp\Client;//import la class Client de Guzzle 

$client = new Client(); //creation d'un objet avec la class Client

$reponse = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon?limit=500');//j'envoie une requete pour avoir une liste 500 pokemon
$data = json_decode($reponse->getBody(), true);//decode le Json pour etre plus precis en vrai sa le transforme en php 

foreach ($data['results'] as $pokemon) {//pour chaque element de la liste results on va faires les commande qui suivent et stoké l'element dans une variable nommé pokemon  
    
    $detailsReponse = $client->request('GET', $pokemon['url']);//on va cherchez l'url de l'element (donc le pokemon) pour avoir plus d'info (y a un API dans l'API en gros)
    $details = json_decode($detailsReponse->getBody(), true);//on decode le JSON
    $image = $details['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
    $imagesDeSecours = $details['sprites']['other']['official-artwork']['front_default'];
    $type = $details['types'][0]['type']['name'];//dans la liste types je prends le premiere element et je vais dans type puis name pour avoir le nom du type 
    $pv = $details['stats'][0]['base_stat'];  //meme principe pour tout

    $capacite1 = $details['abilities'][0]['ability']['name'];

    $url_capacite1 = $details['abilities'][0]['ability']['url'];
    $capResponse1 = $client->request('GET', $url_capacite1);//API dans l'APi de l'APi pour le descriptif de l'attaque 1
    $capDetails1 = json_decode($capResponse1->getBody(), true);
    

    $DetCapacite1 = '';
    foreach ($capDetails1['effect_entries'] as $entry) { //la en gros je boucle jusqu'a que sa soit en anglais car l'ordre des langue change dans l'api (c'est mal foutue)
        if ($entry['language']['name'] === 'en') {
            $DetCapacite1 = $entry['short_effect'];
            break;
        }
    }
    
   
    if (isset($details['abilities'][1]['ability']['name'])) { //verifie l'existance d'une 2eme capacité pour eviter les erreur
        $capacite2 = $details['abilities'][1]['ability']['name'];
        $url_capacite2 = $details['abilities'][1]['ability']['url'];
    $capResponse2 = $client->request('GET', $url_capacite2);
    $capDetails2 = json_decode($capResponse2->getBody(), true);

    $DetCapacite2 = '';
foreach ($capDetails2['effect_entries'] as $entry) {//pareil que pour la capacité 1
    if ($entry['language']['name'] === 'en') {
        $DetCapacite2 = $entry['short_effect'];
        break;
    }
}
    } else {
        $capacite2 = null;
    }

    $blaze = $details['name'];

    echo "<div class='$type carte'>"; //la je donne une class a toutes les cartes avec leur types pour pouvoir les trier et leur mettre une couleur selon le type
    echo "<div class = vie> $pv PV </div>";
    echo " <div class = blaze> $blaze </div>"; 
    

    if (isset($image)){//verifie si il existe un gif sinon on envoie une images png
        echo "<div class = PokeGif><img src='$image' ></div>"; 
    }
    else{
        echo "<div class = PokeGif><img src='$imagesDeSecours' ></div>";
    }
    echo "<div class = Type>Type : $type</div>";
    echo "<div class = abilities> <strong>$capacite1</strong> </div>";
    echo "<div class = Detabilities>$DetCapacite1</div>";

    if (isset($capacite2)){
        echo "<div class = abilities> <strong>$capacite2</strong> </div>";
        echo "<div class = Detabilities> $DetCapacite2 </div>";
    }
    echo "<div class='non-favoris'><img src='image/coeur-vide.png' alt='coeur-vide'></div>";// ça c'est pour garder mon ancien systeme de favoris
    echo "</div>";
}
?>

</div>