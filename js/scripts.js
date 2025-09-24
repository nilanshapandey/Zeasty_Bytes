// Dark / Light Mode
const toggleBtn = document.getElementById('toggleMode');
toggleBtn.addEventListener('click', () => {
  document.body.classList.toggle('dark');
  toggleBtn.textContent = document.body.classList.contains('dark') ? "☀️ Light" : "🌙 Dark";
});

// Scroll to Top
const scrollTopBtn = document.getElementById('scrollTop');
window.addEventListener('scroll', () => {
  scrollTopBtn.style.display = window.scrollY > 200 ? "block" : "none";
});
scrollTopBtn.addEventListener('click', () => {
  window.scrollTo({ top: 0, behavior: "smooth" });
});

// Menu Detail Update
const menuCards = document.querySelectorAll('.menu-card');
const menuImg = document.getElementById('menuDetailImg');
const menuName = document.getElementById('menuDetailName');
const menuDesc = document.getElementById('menuDetailDesc');

menuCards.forEach(card => {
  card.addEventListener('click', () => {
    menuImg.src = card.dataset.img;
    menuName.textContent = card.dataset.name;
    menuDesc.textContent = card.dataset.desc;
  });
});
