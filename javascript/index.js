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
        observer.unobserve(entry.target);
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
  fetch("data/donnees_matchs.json")
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

// Fonction pour centrer l'équipe dans le tableau
function centerOurTeam() {
  var ourTeamRow = document.querySelector(".our-team");

  if (ourTeamRow) {
    var container = document.querySelector(".classement-scroll-container");
    var rowOffset = ourTeamRow.offsetTop;
    var containerHeight = container.offsetHeight;

    // Faire défiler le tableau pour centrer la ligne
    container.scrollTop = rowOffset - containerHeight / 3;
  }
}

// Fonction pour charger et afficher le classement
async function chargerClassement() {
  try {
    const response = await fetch("data/donnees_matchs.json");
    const data = await response.json();

    // Sélectionner la table dans le DOM
    const table = document.querySelector("#classement table");

    // Mettre à jour le titre avec la catégorie
    const titreMatch = document.querySelector("#classement .titre-match h3");
    titreMatch.textContent = data.classement.categorie;

    // Vider le contenu actuel de la table
    table.innerHTML = "";

    // Parcourir les données du classement et créer les lignes
    data.classement.equipes.forEach((equipe) => {
      const tr = document.createElement("tr");

      // Par défaut, toutes les équipes sont "other-team"
      tr.className = "other-team";

      // Si c'est AS MONTIGNY, ajouter la classe our-team à la place
      if (equipe.equipe.includes("AS MONTIGNY")) {
        tr.className = "our-team";
      }

      // Créer le contenu de la ligne
      tr.innerHTML = `
          <td class="number">${equipe.position}</td>
          <td class="team-name">${equipe.equipe}</td>
          <td class="match-play">${equipe.matchs_joues}</td>
          <td class="points">${equipe.points}</td>
      `;

      table.appendChild(tr);
    });

    // Centrer
    setTimeout(centerOurTeam, 100);
  } catch (error) {
    console.error("Erreur lors du chargement du classement:", error);
  }
}

document.addEventListener("DOMContentLoaded", chargerClassement);
