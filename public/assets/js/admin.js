// Anda perlu menargetkan ikon menu di Mini Toolbar untuk memicu ini
document
  .querySelector(".mini-toolbar .toolbar-item .material-icons-outlined")
  .addEventListener("click", function () {
    document.querySelector(".sidebar").classList.toggle("open");
  });
