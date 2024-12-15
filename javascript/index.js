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

// Animation au scroll pour les text-box
document.addEventListener("DOMContentLoaded", function () {
  const textBoxes = document.querySelectorAll(".text-box, .text-box2");

  const options = {
    root: null,
    rootMargin: "0px",
    threshold: 0.7,
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("visible");
        observer.unobserve(entry.target); // Arrête d'observer une fois animé
      }
    });
  }, options);

  textBoxes.forEach((box) => {
    box.classList.add("fade-in");
    observer.observe(box);
  });
});

// add data from python/web.py to the calendar
document.addEventListener("DOMContentLoaded", () => {
  fetch("donnees_matchs.json")
    .then((response) => response.json())
    .then((data) => {
      const [dernierMatch, prochainMatch] = data.matchs;

      // Mise à jour du dernier match
      const previous = document.getElementById("previous");
      previous.querySelector(".titre-match h3").textContent = `${dernierMatch.categorie} / ${dernierMatch.date}`;
      previous.querySelector(".team-container:first-child img").src = dernierMatch.logo_domicile;
      previous.querySelector(".team-container:first-child p").textContent = dernierMatch.equipe_domicile;
      previous.querySelector(".score").textContent = dernierMatch.score;
      previous.querySelector(".team-container:last-child img").src = dernierMatch.logo_visiteur;
      previous.querySelector(".team-container:last-child p").textContent = dernierMatch.equipe_visiteur;

      // Mise à jour du prochain match
      const next = document.getElementById("next");
      next.querySelector(".titre-match h3").textContent = `${prochainMatch.categorie} / ${prochainMatch.date}`;
      next.querySelector(".team-container:first-child img").src = prochainMatch.logo_domicile;
      next.querySelector(".team-container:first-child p").textContent = prochainMatch.equipe_domicile;
      next.querySelector(".score-time").textContent = prochainMatch.score;
      next.querySelector(".team-container:last-child img").src = prochainMatch.logo_visiteur;
      next.querySelector(".team-container:last-child p").textContent = prochainMatch.equipe_visiteur;
    })
    .catch((error) => console.error("Erreur:", error));
});
