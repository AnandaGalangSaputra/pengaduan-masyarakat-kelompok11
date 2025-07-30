<template>
  <div v-if="show" class="modal-backdrop-custom">
    <div class="modal-content-custom">
      <h4>Kebijakan Privasi</h4>
      <div class="modal-body-scroll">
        <p>
          Kami menghormati privasi Anda. Informasi pribadi yang Anda berikan 
          hanya digunakan untuk keperluan layanan kami dan tidak akan dibagikan 
          kepada pihak ketiga tanpa izin Anda.
        </p>
        <p>
          Dengan menggunakan layanan kami, Anda menyetujui pengumpulan dan 
          penggunaan data sesuai kebijakan ini.
        </p>
        <p>
          (Tambahkan teks tambahan sesuai kebutuhan...)
        </p>
      </div>
      <button @click="$emit('close')" class="btn btn-primary mt-3">
        Tutup
      </button>
    </div>
  </div>
</template>

<script setup>
defineProps({
  show: Boolean,
});
</script>

<style scoped>
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
}

.modal-content-custom {
  background: white;
  padding: 20px;
  border-radius: 10px;
  width: 90%;
  max-width: 500px;
  text-align: center;
  animation: fadeIn 0.3s ease-in-out;
}

.modal-body-scroll {
  max-height: 200px;
  overflow-y: auto;
  text-align: left;
  margin-bottom: 10px;
}

@keyframes fadeIn {
  from { opacity: 0; transform: scale(0.9); }
  to { opacity: 1; transform: scale(1); }
}
</style>
