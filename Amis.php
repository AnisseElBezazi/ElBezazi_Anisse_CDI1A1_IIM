
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
    <link rel="stylesheet" href="library.css"/>
</head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<body>
    <!-- division pour le header de mon site suivie de division qui vont servire -->
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
<main>

  <div class="swiper">
    <div class="swiper-wrapper"></div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
    <!-- Add Arrows -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
  </div>
  <p class="append-buttons">
    <a href="#" class="prepend-2-slides">Prepend 2 Slides</a>
    <a href="#" class="slide-1">Slide 1</a>
    <a href="#" class="slide-250">Slide 250</a>
    <a href="#" class="slide-500">Slide 500</a>
    <a href="#" class="append-slide">Append Slide</a>
  </p>

  <!-- Swiper JS -->


</main>
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
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script src="script.js"></script>
<script src="scriptlibrary.js"></script>

  <!-- Swiper JS -->
  


</body>
</html>