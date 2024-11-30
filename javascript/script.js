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
