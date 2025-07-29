<template>
  <footer class="footer text-white py-4">
    <div class="container d-flex justify-content-between align-items-center flex-wrap footer-container">
      <div class="footer-copy fw-bold text-start order-2 order-md-1">
        Pengaduan masyarakat © 2025
      </div>
      <div class="footer-menu d-flex flex-wrap justify-content-end order-1 order-md-2">
        <a href="#" class="text-white text-decoration-none mx-2">Privacy Policy</a>
        <a href="#" class="text-white text-decoration-none mx-2">Terms</a>
      </div>
    </div>
  </footer>
</template>

<style scoped>
.footer {
  background-color: #4f3cc9;
  border-top-left-radius: 15px;
  border-top-right-radius: 15px;
}

.footer-menu a {
  transition: color 0.3s ease;
}

.footer-menu a:hover {
  text-decoration: underline;
  color: #ddd;
}

.footer-menu {
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
  align-items: center;
}

/* Responsive for Mobile */
@media (max-width: 768px) {
  .footer-container {
    flex-direction: column;
    align-items: center;
    text-align: center;
    gap: 10px;
  }

  .footer-menu {
    justify-content: center;
  }

  .footer-copy {
    text-align: center;
  }
}
</style>
