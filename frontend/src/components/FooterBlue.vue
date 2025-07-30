<template>
  <footer class="footer text-white py-4">
    <div
      class="container d-flex justify-content-between align-items-center flex-wrap footer-container"
    >
      <div class="footer-copy fw-bold text-start order-2 order-md-1">
        Pengaduan masyarakat © 2025
      </div>
      <div
        class="footer-menu d-flex flex-wrap justify-content-end order-1 order-md-2"
      >
        <a
          href="#"
          @click.prevent="openPrivacy"
          class="text-white text-decoration-none mx-2"
        >
          Privacy Policy
        </a>
        <a
          href="#"
          @click.prevent="openTerms"
          class="text-white text-decoration-none mx-2"
        >
          Terms
        </a>
      </div>
    </div>
    <!-- Modal Privacy Policy -->
    <div
      v-if="showPrivacy"
      class="modal-backdrop-custom"
      @click.self="closePrivacy"
    >
      <div class="modal-content-custom">
        <h4>Kebijakan Privasi</h4>
        <div class="modal-body-scroll">
          <p>
            Kami menghormati privasi Anda. Informasi pribadi yang Anda berikan
            hanya digunakan untuk keperluan layanan kami dan tidak akan
            dibagikan kepada pihak ketiga tanpa izin Anda.
          </p>
          <p>
            Dengan menggunakan layanan kami, Anda menyetujui pengumpulan dan
            penggunaan data sesuai kebijakan ini.
          </p>
        </div>
        <div class="modal-button">
          <BlueButton text="Tutup" @click="closePrivacy" />
        </div>
      </div>
    </div>
    <div
      v-if="showTerms"
      class="modal-backdrop-custom"
      @click.self="closeTerms"
    >
      <div class="modal-content-custom">
        <h4>Syarat dan Ketentuan</h4>
        <div class="modal-body-scroll">
          <p>
            Dengan menggunakan layanan kami, Anda setuju untuk mematuhi semua
            peraturan yang berlaku.
          </p>
          <p>
            Kami berhak mengubah syarat ini kapan saja tanpa pemberitahuan
            sebelumnya.
          </p>
        </div>
        <BlueButton text="Tutup" @click="closeTerms" />
      </div>
    </div>
  </footer>
</template>

<script setup>
import { ref } from "vue";
import BlueButton from "@/components/BlueButton.vue";

const showPrivacy = ref(false);
const showTerms = ref(false);

const openPrivacy = () => (showPrivacy.value = true);
const closePrivacy = () => (showPrivacy.value = false);

const openTerms = () => (showTerms.value = true);
const closeTerms = () => (showTerms.value = false);
</script>

<style scoped>
.footer {
  background-color: #4f3cc9;;
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

/* Modal Styles */
.modal-backdrop-custom {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.6);
  display: flex;
  justify-content: center;
  align-items: center;
  z-index: 9999;
  animation: fadeIn 0.3s ease-in-out;
}

.modal-content-custom {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  max-width: 500px;
  text-align: center;
  animation: slideUp 0.3s ease-in-out;
  color: black;
}

.modal-body-scroll {
  max-height: 200px;
  overflow-y: auto;
  text-align: left;
  margin-bottom: 10px;
}

@keyframes fadeIn {
  from {
    opacity: 0;
  }
  to {
    opacity: 1;
  }
}

@keyframes slideUp {
  from {
    transform: translateY(20px);
    opacity: 0;
  }
  to {
    transform: translateY(0);
    opacity: 1;
  }
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
  .modal-button {
    display: flex;
    justify-content: center;
    margin-top: 5px;
  }
}
</style>
