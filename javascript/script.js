// Button for links inscirption
const ctaButton = document.getElementById("cta-button");
const overlay = document.querySelector(".overlay");
const menu = document.querySelector("#menu");
const links = document.querySelector(".links");

// Fonction pour afficher le menu diagonal
ctaButton.addEventListener("click", () => {
  menu.classList.add("four"); // Ajoute la classe pour afficher le menu diagonal
  setTimeout(() => {
    document.body.classList.add("menu-active"); // Affiche l'overlay et le menu
  }, 100);
});

// Événements pour fermer le menu en cliquant sur l'overlay ou sur les liens
overlay.addEventListener("click", () => {
  document.body.classList.remove("menu-active");
  setTimeout(() => {
    menu.classList.remove("four"); // Enlève la classe pour revenir à l'état initial
  }, 400);
});

links.addEventListener("click", () => {
  document.body.classList.remove("menu-active");
  setTimeout(() => {
    menu.classList.remove("four"); // Enlève la classe pour revenir à l'état initial
  }, 400);
});
