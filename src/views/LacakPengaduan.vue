<template>
  <section class="vh-100">
    <div class="container d-flex justify-content-center">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <h3
            class="text-judul fw-bold text-center"
            data-aos="fade-down"
            data-aos-delay="600"
          >
            Ketahui Kemajuan Pengaduan Anda <br />
            Pelacakan Cepat dan Transparansi Informasi Pengaduan
          </h3>
        </div>
        <div class="col-md-7 pt-4">
          <p
            class="text-isi text-center fw-normal"
            data-aos="fade-down"
            data-aos-delay="500"
          >
            Isilah form di bawah ini dengan informasi yang jelas dan lengkap
            agar <br />
            laporan Anda bisa segera diproses.
          </p>
        </div>
        <div class="col-md-12 d-flex justify-content-center my-5">
          <form>
            <div class="mb-3 my-3">
              <input
                type="text"
                class="form-control"
                placeholder="Masukan tiket pengaduan"
                data-aos="zoom-in-up"
                data-aos-delay="400"
              />
            </div>
            <div class="mb-3 my-5">
              <input
                type="text"
                class="form-control"
                placeholder="Masukan NIK Anda"
                data-aos="zoom-in-up"
                data-aos-delay="400"
              />
            </div>
          </form>
        </div>
        <BlueButton
          class="blue-button"
          text="Lacak"
          icon="fa fa-arrow-right"
          data-aos="zoom-in-up"
          data-aos-delay="400"
        />
      </div>
    </div>
  </section>

  <div class="bg">
    <div class="py-5 container">
      <div
        class="d-flex flex-column gap-4 py-5 flex-md-row justify-content-center"
      >
        <div
          class=""
          v-for="(Lacak, index) in lacakList"
          :key="index"
          :data-aos="'zoom-in-up'"
          :data-aos-delay="index * 200 + 300"
        >
          <CardLacak :judul="Lacak.judul" :deskripsi="Lacak.deskripsi" />
        </div>
      </div>
    </div>
  </div>
  <FooterBlue/>
</template>

<script>
import BlueButton from "@/components/BlueButton.vue";
import CardLacak from "@/components/cardlacak.vue";
import FooterBlue from "@/components/FooterBlue.vue";
export default {
  components: {
    BlueButton,
    CardLacak,
    FooterBlue,
  },
  data() {
    return {
      lacakList: [
        {
          judul: "Butuh Bantuan?",
          deskripsi:
            "Buka Halaman Pusat Bantuan untuk pertanyaan lebih lanjut.",
        },
        {
          judul: "Dapat diakses Kapanpun dan dimanapun",
          deskripsi: "Buka Laporanmu. Kapanpun. Dimanapun.",
        },
        {
          judul: "Pantau Aduan",
          deskripsi:
            "Lacak status pengaduan secara real-time dari Menu Pantau pengaduan.",
        },
      ],
    };
  },
};
</script>

<style scoped>
.bg {
  background-color: #eaeaea;
}
.container {
  padding-top: 110px;
}



.button-blue {
  transition: all 0.3s ease-in-out;
  position: relative;
  background: #007bff;
  max-width: 200px;
}

.button-blue:hover {
  transform: translateY(-2px);
  box-shadow: 0 5px 15px rgba(0, 123, 255, 0.4);
}

.button-blue::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  border-radius: inherit;
  background: inherit;
  filter: blur(40px);
  opacity: 0;
  transition: all 0.3s ease;
  z-index: -1;
}

.button-blue:hover::after {
  opacity: 0.7;
  transform: scale(1.1);
}

.text-judul {
  font-size: 36px;
}
.text-isi {
  color: #a9a9a9;
  font-size: 18px;
}

.form-control {
  height: 60px;
  width: 1000px;
}

input::placeholder,
textarea::placeholder {
  color: #a9a9a9;
}
</style>
