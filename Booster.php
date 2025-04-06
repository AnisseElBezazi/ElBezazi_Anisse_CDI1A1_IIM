
<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: formulaire.php');
    exit;
}

$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<header> 
        <div class="traits">
            <div class="tra">
                <img src="image/3barre.png" alt="dragon ball 1" width="70px"  >
            </div>
            <div class=" menu-text">
            <a href="Page1.php"><p id="Accueil">Accueil</p></a>
            <a href="Personnage.php"><p id="Accueil">Pokemon</p></a>
            <a href="Booster.php"><p> Booster</p></a>
            <a href="Amis.php"><p> Amis</p></a>
        </div>
        </div>
        <div class="logo-site">
            <img src="image/pokemon-&-Co.png" alt="Logo pokemon & co" width="300px">
        </div>
<div class="haut-droit">
    <div class="darkmode" id="dark">
        <img src="image/blue-moon.png" alt="moon" width="40px" height="40px" >
    </div>
<div class="compte">
<img src="<?= $_SESSION['user']['picture'] ?>" alt="profilpicture" >
<a href="Deconnexion.php"><p id="connexion">Deconnexion</p></a>

</div>
</div>
</header> 

<div class="Depliable">
<div class= Acceuil>
    <a href="Page1.php"><p id="Accueil">Accueil</p></a>
   </div>
   <div class= Pokemon>
    <a href="Personnage.php"><p id="Accueil">Pokemon</p></a>
</div>
<div class= Booster>
    <a href="Booster.php"><p> Booster</p></a>
</div>
<div class= Echange>
    <a href="Amis.php"><p>Amis</p></a>
</div>
</div>

<div class="page-booster">
    <div class="booster">
        <div class="collection-image">
        <img src="image/ecarlate-et-violet.jpg" alt="">
    </div>
        <div class="titre-booster"><h4>Écarlate & Violet</h4></div>
        <div class="description-booster">La dernière extension Pokémon sortie à ce jour.</div>
        <div class="ouverture-booster"> 
           <div class="bouton-ouverture-booster">
            <img src="image/logo-pokemon-blanc.png" alt="" width="50px"><h4>Ouvrir le booster</h4>
           </div> 
        </div>
    </div>

    <div class="cartes3">
    <?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$client = new Client();

$response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon?limit=30');
$data = json_decode($response->getBody(), true);

foreach ($data['results'] as $pokemon) {
    
    $detailsResponse = $client->request('GET', $pokemon['url']);
    $details = json_decode($detailsResponse->getBody(), true);
    $image = $details['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
    $imagesDeSecours = $details['sprites']['other']['official-artwork']['front_default'];
    $type = $details['types'][0]['type']['name'];
    $pv = $details['stats'][0]['base_stat'];

    $capacite1 = $details['abilities'][0]['ability']['name'];
    $url_capacite1 = $details['abilities'][0]['ability']['url'];
    $capResponse1 = $client->request('GET', $url_capacite1);
    $capDetails1 = json_decode($capResponse1->getBody(), true);
    

    $DetCapacite1 = '';
    foreach ($capDetails1['effect_entries'] as $entry) {
        if ($entry['language']['name'] === 'en') {
            $DetCapacite1 = $entry['short_effect'];
            break;
        }
    }
    
   
    if (isset($details['abilities'][1]['ability']['name'])) {
        $capacite2 = $details['abilities'][1]['ability']['name'];
        $url_capacite2 = $details['abilities'][1]['ability']['url'];
    $capResponse2 = $client->request('GET', $url_capacite2);
    $capDetails2 = json_decode($capResponse2->getBody(), true);
    $DetCapacite2 = '';
foreach ($capDetails2['effect_entries'] as $entry) {
    if ($entry['language']['name'] === 'en') {
        $DetCapacite2 = $entry['short_effect'];
        break;
    }
}
    } else {
        $capacite2 = null;
    }

    $blaze = $details['name'];

    echo "<div class='$type carte'>";
    echo "<div class = vie> $pv PV </div>";
    echo " <div class = blaze> $blaze </div>"; 
    

    if (isset($image)){
        echo "<div class = PokeGif><img src='$image' ></div>";
    }
    else{
        echo "<img src='$imagesDeSecours' >";
    }
    echo "<div class = Type>Type : $type</div>";
    echo "<div class = abilities> <strong>$capacite1</strong> </div>";
    echo "<div class = Detabilities>$DetCapacite1</div>";

    if (isset($capacite2)){
        echo "<div class = abilities> <strong>$capacite2</strong> </div>";
        echo "<div class = Detabilities> $DetCapacite2 </div>";
    }
    echo "<div class='non-favoris'><img src='image/coeur-vide.png' alt='coeur-vide'></div>";
    echo "</div>";
}
?>

</div>
</div>




<footer class="footer1"> 
    <div class="nous">
    <h5>A propos de nous</h5>
    <p>Je suis un jeune étudiant à l'IIM Digital School <br>cherchant à se surpasser tous les jours</br></p>
</div>
<div class="link">
    <h5>Lien rapides</h5>
    <p>Mentions légales</br><br>Politique de confidentialité</br><br>Conditions d'utilisation</br></p>
</div>
<div class="Follow">
    <h5>Suivez nous</h5>
   <a href="https://www.instagram.com"> <img src="image/insta-grey.png" alt="insta" width="50px"></a>
   <a href="https://x.com"><img src="image/X-grey.png" alt="X" width="50px"></a>
</div>

<!-- Creation d'un bouton Echanger -->
<button class="echange-bouton">Echanger</button>
    
    <div class="echange-body">
        <div class="contenu-echange">
            <span class="croix" >x</span>
            <h2> Echangé des cartes :</h2>
            <form class="page-echange">
                <label for="personne">Choix de la personne:</label>
                <select id="personne" name="personne" required>
                    <option value="person1">Yanis</option>
                    <option value="person2">Loic</option>
                    <option value="person3">Elise</option>
                </select>
                
                <label for="choix-carte">Choix de la carte:</label>
                <select id="cartes" name="cartes" required>
                    <option value="carte">Togepi</option>
                    <option value="carte">Obalie</option>
                    <option value="carte">Nymphalie-ex</option>
                </select>
                
                <button type="submit">Envoyer</button>
            </form>
            </div>
            </div>

</footer>
<script src="scriptbooster.js"></script>
</body>
</html>