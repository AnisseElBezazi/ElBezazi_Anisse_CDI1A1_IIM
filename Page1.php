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
    <meta name="description" content="Collectionnez des cartes Pokémon, ouvrez des boosters et échangez avec d'autres joueurs ! Rejoignez la communauté et agrandissez votre collection dès maintenant.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cartes Pokémon rares : Ouvrez des boosters et complétez votre deck</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body class="body1">
    <!-- division pour le header de mon site suivie de division qui vont servir pour le menu-->
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

<div class="landing">
    <img src="image/pickachu-fond-jaune.png" alt="image de pickachu fond jaune" >
    <div class="titre">
        <div class="collectionnez">
            <h1>Collectionnez <br>
                et ouvrez !</h1>
        </div>
        
        <h2> La plateforme ultime pour tous les passionné de cartes <a href="https://www.pokemon.com/fr">Pokemon ! </a>   <br> Ici ouvrez des boosters en direct, enrichissez votre collection en directe et partager votre passion avec vos amis ! </h2>
    </div>
    
</div>
<div class="filtre">
<div class="bouton tab1 tab active-filtre" data-type="all">
    <p>All</p>
  </div>
  <div class="bouton tab2 tab" data-type="fire">
    <p>Fire</p>
  </div>
  <div class="bouton tab3 tab" data-type="grass">
    <p>Grass</p>
  </div>
  <div class="bouton tab4 tab" data-type="water">
    <p>Water</p>
  </div>
  <div class="bouton tab5 tab" data-type="normal">
    <p>Normal</p>
  </div>
  <div class="bouton tab5 tab" data-type="bug">
    <p>Bug</p>
  </div>
  <div class="bouton tab5 tab" data-type="poison">
    <p>Poison</p>
  </div>
  <div class="bouton tab5 tab" data-type="ground">
    <p>Ground</p>
  </div>
  <div class="bouton tab5 tab" data-type="fairy">
    <p>Fairy</p>
  </div>
  <div class="bouton tab5 tab" data-type="fighting">
    <p>Fighting</p>
  </div>
  <div class="bouton tab5 tab" data-type="psychic">
    <p>Psychic</p>
  </div>
  <div class="bouton tab5 tab" data-type="rock">
    <p>Rock</p>
  </div>
  <div class="bouton tab5 tab" data-type="ghost">
    <p>Ghost</p>
  </div>
  <div class="bouton tab5 tab" data-type="ice">
    <p>Ice</p>
  </div>
  <div class="bouton tab5 tab" data-type="dragon">
    <p>dragon</p>
  </div>
  <div class="bouton tab5 tab" data-type="dark">
    <p>Dark</p>
  </div>
  <div class="bouton tab5 tab" data-type="steel">
    <p>Steel</p>
  </div>
  <div class="bouton tab5 tab" data-type="flying">
    <p>Flying</p>
  </div>
</div>
<main class="main1">

    <button class="arrow left" onclick="moveSlide(-1)"><</button>
<div class="slider contenu contenu1 contenu-active">
<div class="cartes">
        
        <?php
    require 'vendor/autoload.php';
    use GuzzleHttp\Client;
    
    $client = new Client();
    
    $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon?limit=20');
    $data = json_decode($response->getBody(), true);
    
    foreach ($data['results'] as $pokemon) {
        
        $detailsResponse = $client->request('GET', $pokemon['url']);
        $details = json_decode($detailsResponse->getBody(), true);
        $image = $details['sprites']['versions']['generation-v']['black-white']['animated']['front_default'];
        $imagesDeSecours = $details['sprites']['other']['official-artwork']['front_default'];
        $type = $details['types'][0]['type']['name'];
        $pv = $details['stats'][0]['base_stat'];
    
        $capacité1 = $details['abilities'][0]['ability']['name'];
    
        $url_capacite1 = $details['abilities'][0]['ability']['url'];
        $capResponse1 = $client->request('GET', $url_capacite1);
        $capDetails1 = json_decode($capResponse1->getBody(), true);
        $DetCapacité1 = $capDetails1['effect_entries'][0]['short_effect']; 
        
        
       
        if (isset($details['abilities'][1]['ability']['name'])) {
            $capacité2 = $details['abilities'][1]['ability']['name'];
            $url_capacite2 = $details['abilities'][1]['ability']['url'];
        $capResponse2 = $client->request('GET', $url_capacite2);
        $capDetails2 = json_decode($capResponse2->getBody(), true);
        $DetCapacité2 = '';
    foreach ($capDetails2['effect_entries'] as $entry) {
        if ($entry['language']['name'] === 'en') {
            $DetCapacité2 = $entry['short_effect'];
            break;
        }
    }
        } else {
            $capacité2 = null;
        }
    
        $blaze = $details['name'];
    
        echo "<div class='$type carte2'>";
        echo "<div class = vie> $pv PV </div>";
        echo " <div class = blaze> $blaze </div>"; 
        
    
        if (isset($image)){
            echo "<div class = PokeGif><img src='$image' ></div>";
        }
        else{
            echo "<img src='$imagesDeSecours' >";
        }
        echo "<div class = Type>Type : $type</div>";
        echo "<div class = abilities> <strong>$capacité1</strong> </div>";
        echo "<div class = Detabilities>$DetCapacité1</div>";
    
        if (isset($capacité2)){
            echo "<div class = abilities> <strong>$capacité2</strong> </div>";
            echo "<div class = Detabilities> $DetCapacité2 </div>";
        }
        echo "<div class='non-favoris'><img src='image/coeur-vide.png' alt='coeur-vide'></div>";
        echo "</div>";
    }
    ?>
        </div>
 </div>
 <button class="arrow right" onclick="moveSlide(1)">></button>
 <!-- met le parametre direction de la fonction moveSlide a 1 (droite) -->
</main>
<div class="landing2">
    
    <div class="titre">
        <h1>Echangez Vos Cartes !</h1>
        <h2>Vous avez des cartes en double ou que vous n’utilisez plus ? Trouvez facilement des joueurs avec qui échanger et complétez votre collection en un rien de temps !</h3>
    </div>
    <img src="image/landing-images.png" alt="landing-images" >
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
                <select class= "input-echange" id="personne" name="personne" required>
                    <option value="person1">Yanis</option>
                    <option value="person2">Loic</option>
                    <option value="person3">Elise</option>
                </select>
                
                <label for="choix-carte">Choix de la carte:</label>
                <select class= "input-echange" id="cartes" name="cartes" required>
                    <option value="carte">Togepi</option>
                    <option value="carte">Obalie</option>
                    <option value="carte">Nymphalie-ex</option>
                </select>
                
                <button  type="submit" class= "input-echange">Envoyer</button>
            </form>
            </div>
            </div>
            <div class="pickachu-page disapear">
                <div class="content-pickachu-page"> 
                    <span class="croix2" >x</span> 
                    <div class="image-carte">
                        <img src="Cartes/pikachu ex.jpg" alt="carte pickachu-ex">
                    </div>
                    <div class="histoire-carte">
                        <h4>Pikachu est un Pokémon de type Électrik, connu pour sa capacité à manipuler l'électricité. <br><br>Il est devenu célèbre en tant que compagnon fidèle de Sacha dans la série Pokémon. <br><br>Depuis ses débuts dans les jeux vidéo en 1996, Pikachu est devenu un symbole de la culture populaire et un favori des fans dans le monde entier.</h4>
                    </div>
                    
                </div>
            </div>
</footer>
<script src="script.js"></script>
</body>
</html>