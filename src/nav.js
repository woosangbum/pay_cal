const toggleBtn = document.querySelector(".navbar__toogleBtn");
const linkList = document.querySelector(".navbar__linkList");
const members = document.querySelector(".navbar__members");

toggleBtn.addEventListener("click", () => {
  linkList.classList.toggle("active");
  members.classList.toggle("active");
});
