// Anda perlu menargetkan ikon menu di Mini Toolbar untuk memicu ini
document
  .querySelector(".mini-toolbar .toolbar-item .material-icons-outlined")
  .addEventListener("click", function () {
    document.querySelector(".sidebar").classList.toggle("open");
  });

document.addEventListener("DOMContentLoaded", function () {
  // 1. Logika untuk Expand/Collapse Submenu
  const menuToggles = document.querySelectorAll(".sidebar .menu-toggle");
  menuToggles.forEach((toggle) => {
    toggle.addEventListener("click", function (e) {
      e.preventDefault();
      // Temukan elemen <li> terdekat yang memiliki class has-submenu
      const parentLi = this.closest(".has-submenu");
      if (parentLi) {
        parentLi.classList.toggle("expanded");
      }
    });
  });

  // 2. Logika untuk Toggle Sidebar (Optional)
  // Jika Anda ingin ikon 'menu' di mini-toolbar bisa menyembunyikan/menampilkan sidebar
  const sidebarToggle = document.querySelector(".sidebar-toggle-btn");
  const body = document.body; // Asumsi Anda akan menambahkan class ke body

  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", function () {
      // Contoh: Menambahkan class 'sidebar-collapsed' ke body
      body.classList.toggle("sidebar-collapsed");
    });
  }
});
