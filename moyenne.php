<?php

$nom = "Sacha";
$note1 = 1;
$note2 = 15;
$note3 = 20;

//variable pour teste 

function calculerMoyenne($a, $b, $c) {//fonction qui retourne la moyenne des 3 parametres
    return ($a + $b + $c) / 3;
}



function afficherResultat($nom, $moyenne) { //fonction pour afficher la moyenne de l'eleve et si il est suffisante 
    echo "Élève : $nom<br>";
    echo "Moyenne : $moyenne<br>";

    if ($moyenne >= 10) { //si au dessus ou egal a 10 j'affiche suffisant sinon j'affiche Insuffisant
        echo "Résultat : Suffisant";
    } else {
        echo "Résultat : Insuffisant";
    }
}


$moyenne = calculerMoyenne($note1, $note2, $note3); //appelle la fonction calculer la moyenne avec en parametre les 3 notes (le resultat est stocker dans la variable moyenne )
afficherResultat($nom, $moyenne); //appelle la fonction pour afficher le resultat 
?>
