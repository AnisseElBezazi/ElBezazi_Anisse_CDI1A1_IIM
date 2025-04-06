<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Pokemon</title>
    <link rel="stylesheet" href="style.css"/>
    <script src="scriptformulaire.js" defer></script>
</head>
<body>
        <div class="logo-site-form">
            <img src="image/pokemon-&-Co.png" alt="Logo pokemon & co" width="300px">
        </div>

        <div class="formulaire">
            
<form class="inscription" method="POST" enctype="multipart/form-data">
    <div class="images-map">

    <div class="formulaire_droite">
        <div class="Enregistrement"><h1>Enregistrez vous</h1></div>
<div>
<label for="pseudo">Pseudo</label>
<input type="text" name="pseudo" id="pseudo">
</div>

<div>
<label for="email">Email</label>
<input type="email" name="email" id="email">
</div>
    
<div>
<label for="password">Mot de passe</label>
<input type="password" name="password" id="password">
</div>


<div>
<label for="password2">Entrer à nouveau le mot de passes</label>
<input type="password" name="password2" id="password2">
</div>

<div class="lien-connxion">
<?php 
require 'vendor/autoload.php';

$client = new Google_Client();// crée un objet avec la class Google_Client
$client->setClientId('81770474473-n3jsva7qhgdoblhoudmsjvi4v2ati7kj.apps.googleusercontent.com'); //Id donner sur le site de google
$client->setClientSecret('');// code secret donner sur le site de google 
$client->setRedirectUri('http://localhost/SIte-web-pokemon--main/Site-pokemon--page-2-et-filtre-/callback2.php'); //redirige la personne vers la page callback
$client->addScope('email');//demande a google l'accés au mail 
$client->addScope('profile');//demande a google l'accés au profil cad pseudo et pp

$authUrl = $client->createAuthUrl(); //crée un url qui mennent vers google avec tout les 
?>
<div class = bouton_GOOGLE>
    <img src="image/google-37.png" alt="logo google">
<a href="<?= htmlspecialchars($authUrl) ?>">Se connecter avec Google</a><!--html qui permet de rediriger vers l'url crée avant  -->
<!-- htmlspecialchars sert a transfomer les caractere speciaux -->
</div>
</div>
<button type="submit" class="inscription-boutton">s'inscrire</button>
</div>
<div class = message>
<div class="message-error">
    <ul></ul>
</div>
<div class="message-succes">
    <ul></ul>
</div>
</div>
</div>
</form>
</div>
</body>
</html>