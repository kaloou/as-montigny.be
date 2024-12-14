// Sélectionner les éléments nécessaires
const leftButton = document.getElementById("left");
const rightButton = document.getElementById("right");
const carousel = document.querySelector(".carousel");

// Fonction pour déplacer le carrousel à gauche
leftButton.addEventListener("click", () => {
  carousel.scrollBy({
    left: -carousel.offsetWidth / 4, // Décale d'une "colonne" de cartes
    behavior: "smooth",
  });
});

// Fonction pour déplacer le carrousel à droite
rightButton.addEventListener("click", () => {
  carousel.scrollBy({
    left: carousel.offsetWidth / 4, // Décale d'une "colonne" de cartes
    behavior: "smooth",
  });
});
