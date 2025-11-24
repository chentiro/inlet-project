document.addEventListener("DOMContentLoaded", () => {
  // 1. Ambil elemen yang dibutuhkan (hanya sekali)
  const navbar = document.querySelector(".navbar");
  const toggleButton = document.querySelector(".hamburger-toggle");
  const menuLinks = document.querySelector("#menu-links");

  // WAJIB: Definisikan toggleIcon di sini, setelah toggleButton
  const toggleIcon = toggleButton ? toggleButton.querySelector("i") : null;
  const scrollThreshold = 80;

  // --- Logika Navbar Toggle (Hamburger) ---
  if (toggleButton && menuLinks && toggleIcon) {
    toggleButton.addEventListener("click", () => {
      menuLinks.classList.toggle("active");

      // KUNCI: Ganti ikon saat menu aktif/tidak aktif
      if (menuLinks.classList.contains("active")) {
        toggleIcon.textContent = "close";
        toggleIcon.classList.add("rotated");
      } else {
        toggleIcon.textContent = "menu";
        toggleIcon.classList.remove("rotated");
      }

      // Mengubah aria-expanded untuk aksesibilitas
      const isExpanded =
        toggleButton.getAttribute("aria-expanded") === "true" || false;
      toggleButton.setAttribute("aria-expanded", !isExpanded);
    });
  }

  // --- Logika Navbar Scroll (Warna) ---
  if (navbar) {
    // Fungsi yang akan menjalankan pengecekan dan class toggle
    const handleScroll = () => {
      // Cek apakah lebar layar lebih dari 767px (Hanya Tablet/Desktop)
      if (window.innerWidth >= 768) {
        if (window.scrollY > scrollThreshold) {
          navbar.classList.add("scrolled");
        } else {
          navbar.classList.remove("scrolled");
        }
      } else {
        // Nonaktifkan scroll class di mobile
        navbar.classList.remove("scrolled");
      }
    };

    // Tambahkan listener untuk Scroll dan Resize
    window.addEventListener("scroll", handleScroll);
    window.addEventListener("resize", handleScroll);

    // Jalankan sekali saat halaman dimuat
    handleScroll();
  }
});

// Dapatkan semua tautan di dalam menu navigasi
const navLinks = document.querySelectorAll("#menu-links a");

// Asumsi toggleIcon sudah didefinisikan: const toggleIcon = toggleButton.querySelector('i');

// Tambahkan event listener ke setiap tautan
navLinks.forEach((link) => {
  link.addEventListener("click", () => {
    // Cek apakah menu sedang terbuka
    if (menuLinks.classList.contains("active")) {
      // 1. Hapus kelas 'active' (Mulai animasi slide-up)
      menuLinks.classList.remove("active");

      // 2. Kembalikan ikon dan status ARIA
      if (toggleIcon) {
        toggleIcon.textContent = "menu";
        toggleIcon.classList.remove("rotated");
      }
      toggleButton.setAttribute("aria-expanded", "false");
    }
  });
});
