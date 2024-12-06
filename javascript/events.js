const liItem = document.querySelectorAll("ul li");
const imgItem = document.querySelectorAll(".product img");

liItem.forEach((li) => {
  li.onclick = function () {
    // Active
    liItem.forEach((li) => {
      li.className = "";
    });
    li.className = "active";

    // Filter
    const value = li.textContent;
    imgItem.forEach((img) => {
      img.style.display = "none";
      if (value.toLowerCase() === "tout" || img.getAttribute("data-filter") === value.toLowerCase()) {
        img.style.display = "block";
      }
    });

    // Show all elements
    if (value.toLowerCase() === "tout") {
      imgItem.forEach((img) => {
        img.style.display = "block";
      });
    }
  };
});
