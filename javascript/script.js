// Button for links inscirption
const overlay = document.querySelector(".overlay");
const menu = document.querySelector("#menu");
const links = document.querySelector(".links");

const handleClick = (buttonId) => {
  menu.classList = [];
  menu.classList.add(buttonId);
  setTimeout(() => {
    document.body.classList.add("menu-active");
  }, 100);
};

menu.addEventListener("click", () => {
  document.body.classList.remove("menu-active");

  setTimeout(() => {
    menu.classList = [];
  }, 400);
});

links.addEventListener("click", () => {
  document.body.classList.remove("menu-active");

  setTimeout(() => {
    menu.classList = [];
  }, 400);
});

// place the row table of our team in center
document.addEventListener("DOMContentLoaded", function () {
  // Sélectionner la ligne avec la classe 'our-team'
  var ourTeamRow = document.querySelector(".our-team");

  if (ourTeamRow) {
    // Calculer la position de la ligne dans le tableau
    var container = document.querySelector(".classement-scroll-container"); // Le conteneur défilant
    var rowOffset = ourTeamRow.offsetTop; // Position de la ligne dans le tableau
    var containerHeight = container.offsetHeight; // Hauteur du conteneur visible

    // Faire défiler le tableau pour centrer la ligne avec un léger ajustement vers le haut
    container.scrollTop = rowOffset - containerHeight / 3; // Défilement vers le haut (ici, vous pouvez ajuster le /3 pour plus ou moins de centrage)
  }
});
