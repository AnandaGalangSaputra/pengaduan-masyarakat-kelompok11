<template>
  <section class="min-vh-100 py-5 overflow-hidden">
    <div class="container justify-content-center pt-5">
      <h1 class="text-judul fw-bold text-center">Contact Us!</h1>
      <p class="text-center fw-normal" style="color: #a9a9a9; font-size: 18px;">
        Hubungi Kami Untuk Masalah Yang Tidak Dapat Anda Selesaikan
      </p>

      <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="col-12 col-md-6 my-4 d-flex justify-content-center">
          <img src="../assets/Images/email.png" alt="email" class="img_kontak img-fluid" />
        </div>

        <div class="col-12 col-md-6 d-flex flex-column justify-content-center align-items-center">
          <div class="w-75 w-md-50">
            <input
              v-model="email"
              type="text"
              placeholder="Email"
              class="form-control mb-3"
              style="height: 45px; border-radius: 50px;"
            />
            <input
              v-model="nama"
              type="text"
              placeholder="Nama"
              class="form-control mb-3"
              style="height: 45px; border-radius: 50px;"
            />
            <textarea
              v-model="pesan"
              placeholder="Masukkan Pesanmu"
              class="form-control mb-3"
              style="height: 90px; border-radius: 20px; resize: none;"
            ></textarea>
            <button
              type="button"
              @click="kirimPesan"
              class="btn w-100"
              style="height: 45px; border-radius: 50px; background: linear-gradient(to right, #8e2de2, #4a00e0); color: white;"
            >
              SEND MESSAGE
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return { email: '', nama: '', pesan: '' };
  },
  methods: {
    kirimPesan() {
      alert('Pesanan terkirim!');
      this.email = '';
      this.nama = '';
      this.pesan = '';
    }
  }
};
</script>

<style scoped>
.img_kontak {
  max-width: 400px; 
  height: auto;
}

@media (max-width: 768px) { 
  .img_kontak {
    max-width: 250px; 
  }
}

@media (max-width: 576px) { 
  .img_kontak {
    max-width: 180px; 
  }
}

</style>
