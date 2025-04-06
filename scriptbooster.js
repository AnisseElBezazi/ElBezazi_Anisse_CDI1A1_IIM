/*dark mode*/
let BoutonDark= document.querySelector("#dark");
let Page= document.querySelector("body");
let Top = document. querySelector("header");
let Traits = document.querySelector(".tra") ;/*cration de variable qui appele ici la class tra dans le DOM pour ensuite l'utiliser dans mon code */
let TopLeft = document.querySelector(".traits");
let filtre = document.querySelector(".filtre");
let sideBar = document.querySelector(".Depliable");
let boosters = document.querySelectorAll(".booster");

BoutonDark.addEventListener ("click",function(){ /*Lorsque le bouton darkmode est cliquer  */
   boosters.forEach((booster) => {
      booster.classList.toggle('dark-filtre'); 
  });
Page.classList.toggle('dark-back');/*on ajoute des class css a chaque element afin de changer l'image du background et la couleur des text */
Top.classList.toggle('dark-haut');
TopLeft.classList.toggle('haut-gauche-dark');/*meme principe partout  */
sideBar.classList.toggle('dark-side-bar'); 
});


let MenuMobile =document.querySelector(".tra"); /* Bouton avec les 3 traits  */
let Depliant = document.querySelector(".Depliable");/*Menu depliant */

MenuMobile.addEventListener ("click",function(){ /* lorsque qu'on click sur les 3 traits  */
   Depliant.classList.toggle("menu-visible");/*On rajoute au menu depliant une class ccs lui permetant de passer l'opacité a 1 et changer sa position */
})





/*Simulation booster pokemon */
const boutonBooster = document.querySelector(".bouton-ouverture-booster"); 
const toutesLesCartes = document.querySelectorAll(".carte");

const raretes = ["fire", "grass", "water", "electric", "normal", "psychic", "dragon", "poison", "fairy", "fighting", "ghost", "rock", "ice", "bug", "dark", "flying", "ground", "steel"];

function tirerCarteAleatoire() {
  const rareteAleatoire = raretes[Math.floor(Math.random() * raretes.length)];
  const cartesDeCetteRareté = document.querySelectorAll(`.carte.${rareteAleatoire}`);

  if (cartesDeCetteRareté.length === 0) return null;

  const index = Math.floor(Math.random() * cartesDeCetteRareté.length);
  return cartesDeCetteRareté[index];
}
boutonBooster.addEventListener("click", function () {
  toutesLesCartes.forEach(carte => carte.classList.add('disapear'));
  const cartesTirees = new Set();
  while (cartesTirees.size < 3) {
    const carte = tirerCarteAleatoire();
    if (carte) {
      cartesTirees.add(carte);
    }
  }
  cartesTirees.forEach(carte => carte.classList.remove('disapear'));
});


/*Favoris*/


document.querySelectorAll('.carte').forEach(carte => {
   const nonFavoris = carte.querySelector('.non-favoris img'); /*Pour chaque carte on selectionne l'image de la class non-favoris */

   nonFavoris.addEventListener('click', function() { /*Lorsqu'on click sur un coeur  */
       
       if (nonFavoris.getAttribute('src') === 'image/coeur-vide.png') {/*Si le src de ma class nonFavoris est l'image de coeur vide */
           nonFavoris.setAttribute('src', 'image/coeur-plein.png'); /*Alors je modifie le src de ma class par une image de coeur plein   */
           nonFavoris.classList.add('opaciterMax'); /*et je met l'opacité au max pour que celui ci ne soit pas affecter par le hover */
       } else {
           nonFavoris.setAttribute('src', 'image/coeur-vide.png');  /*sinon je remplace le src par une image de coeur vide */
           nonFavoris.classList.remove('opaciterMax');/*j'enleve l'opacité au max par default pour que le coeur vide apparait seulement quand on passe au dessus d'une carte */
       }
   });
});


/*Modal echange*/
let PageEchange = document.querySelector(".echange-body") /*Page pour echanger dans le DOM */
let boutonEchange =document.querySelector(".echange-bouton")/*Bouton echanger en bas a droite du DOM */
let Croix = document.querySelector(".croix")/*Croix presente en haut a droite de ma page echanger dans le DOM */

boutonEchange.addEventListener('click', function() {/*Lorsque on click sur le bouton echanger */
    PageEchange.classList.add("apear")/*ajout d'une class CSS qui pour seul but d'ajouter un display Block */
});

Croix.addEventListener('click', function() {/*Lorsque on click sur la croix */
    PageEchange.classList.remove("apear");/*retire une class CSS qui pour seul but d'ajouter un display Block */
});
