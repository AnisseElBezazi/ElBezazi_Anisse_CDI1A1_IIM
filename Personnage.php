
<?php
//session_start();
//if (!isset($_SESSION['user'])) {
  //  header('Location: formulaire.php');
    //exit;
//}

//$user = $_SESSION['user'];
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokemon</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
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
    
<div class="filtre">
<div class="bouton tab1 tab active-filtre" type="All">
    <p>All</p>
  </div>
  <div class="bouton tab2 tab" type="fire">
    <p>Fire</p>
  </div>
  <div class="bouton tab3 tab" type="grass">
    <p>Grass</p>
  </div>
  <div class="bouton tab4 tab" type="water">
    <p>Water</p>
  </div>
  <div class="bouton tab5 tab" type="electric">
    <p>Electric</p>
  </div>
  <div class="bouton tab5 tab" type="normal">
    <p>Normal</p>
  </div>
  <div class="bouton tab5 tab" type="bug">
    <p>Bug</p>
  </div>
  <div class="bouton tab5 tab" type="poison">
    <p>Poison</p>
  </div>
  <div class="bouton tab5 tab" type="ground">
    <p>Ground</p>
  </div>
  <div class="bouton tab5 tab" type="fairy">
    <p>Fairy</p>
  </div>
  <div class="bouton tab5 tab" type="fighting">
    <p>Fighting</p>
  </div>
  <div class="bouton tab5 tab" type="psychic">
    <p>Psychic</p>
  </div>
  <div class="bouton tab5 tab" type="rock">
    <p>Rock</p>
  </div>
  <div class="bouton tab5 tab" type="ghost">
    <p>Ghost</p>
  </div>
  <div class="bouton tab5 tab" type="ice">
    <p>Ice</p>
  </div>
  <div class="bouton tab5 tab" type="dragon">
    <p>dragon</p>
  </div>
  <div class="bouton tab5 tab" type="dark">
    <p>Dark</p>
  </div>
  <div class="bouton tab5 tab" type="steel">
    <p>Steel</p>
  </div>
  <div class="bouton tab5 tab" type="flying">
    <p>Flying</p>
  </div>
</div>

<main>
    

    <div class="cartes2">
        
   
    </div>

 
 
</main>
<footer>
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
    <img src="image/insta-grey.png" alt="gohan card" width="50px">
    <img src="image/X-grey.png" alt="X" width="50px">
</div>
<button class="echange-bouton">Echanger</button>
    
    <div class="echange-body" id="modal">
        <div class="contenu-echange">
            <span class="croix" >x</span>
            <h2>Échange de cartes</h2>
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
<div class="pickachu-page disapear">
    <div class="content-pickachu-page"> 
        <span class="croix2" >x</span> 
        <div class="image-carte">
            <img src="Cartes/pikachu ex.jpg" alt="carte pickachu-ex">
        </div>
        <div class="histoire-carte">
            <h4>Pikachu est un Pokémon de type Électrik, connu pour sa capacité à manipuler l'électricité. <br>Il est devenu célèbre en tant que compagnon fidèle de Sacha dans la série Pokémon. <br>Depuis ses débuts dans les jeux vidéo en 1996, Pikachu est devenu un symbole de la culture populaire et un favori des fans dans le monde entier.</h4>
        </div>
        
    </div>
</div>
<script src="script.js"></script>
</body>
</html>