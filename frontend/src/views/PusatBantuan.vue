<template>
  <div class="container py-5">
    <div class="rounded-3 p-5 mb-5 text-center">
      <h1
        class="display-4 mb-3 fw-semibold"
        data-aos="fade-down"
        data-aos-duration="800"
      >
        Pusat Bantuan
      </h1>
      <p
        class="lead mb-4 text-secondary"
        data-aos="fade-down"
        data-aos-duration="800"
      >
        Bagaimana kami dapat membantu Anda?
      </p>
      <div
        class="row justify-content-center"
        data-aos="fade-down"
        data-aos-duration="800"
      >
        <div class="col-md-8">
          <div class="input-group mb-3">
            <input
              type="text"
              class="form-control"
              placeholder="Cari bantuan...."
              v-model="searchQuery"
            />
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <section class="mb-5" data-aos="fade-up" data-aos-duration="800">
      <h2 class="h2 mb-4">Pertanyaan yang Sering Diajukan</h2>
      <div class="row g-4">
        <div class="col-md-6" v-for="(faq, index) in visibleFaqs" :key="index">
          <div class="card h-100 py-2 px-3 shadow-sm">
            <div class="card-body">
              <h5 class="card-title text-primary">
                {{ faq.question }}
              </h5>
              <p class="card-text">{{ faq.answer }}</p>
            </div>
          </div>
        </div>

        <div
          v-if="visibleFaqs.length === 0"
          class="text-center text-secondary mt-4"
        >
          <p>
            Tidak ada hasil ditemukan untuk "<strong>{{ searchQuery }}</strong
            >"
          </p>
        </div>
      </div>

      <!-- Tombol Lihat Selengkapnya -->
      <div
        class="text-center mt-4"
        v-if="
          !showAll && filteredFaqs.length > maxVisible && searchQuery === ''
        "
      >
        <button class="btn btn-outline-primary" @click="showAll = true">
          Lihat Selengkapnya
        </button>
      </div>
    </section>

    <section>
      <h2 class="h2 mb-4" data-aos="fade-up" data-aos-duration="800">
        Butuh Bantuan Lebih Lanjut?
      </h2>
      <div class="row g-4">
        <div
          class="col-md-4 behind-card"
          data-aos="fade-left"
          data-aos-duration="800"
          data-aos-delay="600"
        >
          <div class="card h-100 py-5 text-center shadow-sm">
            <div class="card-body">
              <i class="fas fa-phone fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Hubungi Kami</h5>
              <p class="card-text">0800-1234-5678</p>
            </div>
          </div>
        </div>
        <div
          class="col-md-4 front-card"
          data-aos="fade-up"
          data-aos-duration="800"
        >
          <div class="card h-100 py-5 text-center shadow-sm">
            <router-link
              to="/formcontact"
              class="nav-link"
              active-class="active"
            >
           <div class="card-body">
              <i class="fas fa-envelope fa-2x text-primary mb-3"></i>
              <h5 class="card-title">Email</h5>
              <p class="card-text">anggapajaemailresmi@gmail.com</p>
            </div>
            </router-link>
            
          </div>
        </div>
        <div
          class="col-md-4 behind-card"
          data-aos="fade-right"
          data-aos-duration="800"
          data-aos-delay="600"
        >
          <a
            style="text-decoration: none; color: inherit"
            href="https://wa.me/0812345678"
            target="_blank"
          >
            <div class="card h-100 py-5 text-center shadow-sm">
              <div class="card-body">
                <i class="fas fa-comments fa-2x text-primary mb-3"></i>
                <h5 class="card-title">Whatsapp Kami</h5>
                <p>Chat dengan tim kami</p>
              </div>
            </div>
          </a>
        </div>
      </div>
    </section>
  </div>
  <section id="kelompok" class="">
    <div class="container-fluid">
      <section class="py-5 bg-light w-100 bg-danger">
        <div class="container">
          <h2
            class="text-center display-5 mb-3 fw-semibold mb-5"
            data-aos="fade-up"
            data-aos-duration="800"
          >
            Tim Pengembang
          </h2>
          <div class="row g-4 justify-content-center">
            <!-- Card Profile -->
            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/AnandaGalangSaputra/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="https://ui-avatars.com/api/?name=Ananda+Galang+Saputra&background=random"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Ananda Galang Saputra"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Ananda Galang Saputra</h5>
                    <p class="text-muted small mb-0">23.11.5734</p>
                  </div>
                </a>
              </div>
            </div>

            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
              data-aos-delay="200"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/nadilabrn/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="https://ui-avatars.com/api/?name=Nadila+Febriana&background=random"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Nadila Febriana"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Nadila Febriana</h5>
                    <p class="text-muted small mb-0">23.11.5444</p>
                  </div>
                </a>
              </div>
            </div>

            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
              data-aos-delay="400"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/nursyafiigit/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="../assets/images/foto_orang/nur.jpg"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Muhammad Nur Syafii"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Muhammad Nur Syafii</h5>
                    <p class="text-muted small mb-0">23.11.5451</p>
                  </div>
                </a>
              </div>
            </div>

            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
              data-aos-delay="600"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/UswatunQasanah/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="https://ui-avatars.com/api/?name=Uswatun+Qasanah&background=random"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Uswatun Qasanah"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Uswatun Qasanah</h5>
                    <p class="text-muted small mb-0">23.11.5448</p>
                  </div>
                </a>
              </div>
            </div>

            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
              data-aos-delay="200"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/muammarnibros/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="../assets/images/foto_orang/ammar.jpg"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Muammar Nibros"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Mu'ammar Nibros</h5>
                    <p class="text-muted small mb-0">23.11.5465</p>
                  </div>
                </a>
              </div>
            </div>

            <div
              class="col-sm-6 col-md-4 col-lg-3"
              data-aos="fade-up"
              data-aos-duration="800"
              data-aos-delay="400"
            >
              <div class="card border-0 shadow-sm text-center h-100">
                <a
                  href="https://github.com/nurikhsanGIT/"
                  target="#_blank"
                  class="link-github"
                >
                  <img
                    src="../assets/Images/foto_orang/ikhsan.jpeg"
                    class="rounded-circle mx-auto mt-4 d-block object-fit-cover"
                    width="100"
                    height="100"
                    alt="Nur Ikhsan Cleviriadi"
                  />
                  <div class="card-body">
                    <h5 class="card-title mb-1">Nur Ikhsan Cleviriadi</h5>
                    <p class="text-muted small mb-0">23.11.5487</p>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </section>
  <FooterBlue class="front-card" />
</template>

<script>
import FooterBlue from "@/components/FooterBlue.vue";
import FormContact from "./FormContact.vue";
export default {
  name: "PusatBantuan",
  components: {
    FooterBlue,
    FormContact,
  },
  data() {
    return {
      searchQuery: "",
      showAll: false,
      maxVisible: 3,
      faqs: [
        {
          question: "Bagaimana cara membuat pengaduan?",
          answer: 'Klik tombol "Buat Pengaduan" di halaman utama.',
        },
        {
          question: "Berapa lama proses pengaduan direspon?",
          answer: "Pengaduan direspon dalam waktu 2x24 jam kerja.",
        },
        {
          question: "Bagaimana cara melacak pengaduan?",
          answer: 'Masukkan nomor tiket Anda di menu "Lacak Pengaduan".',
        },
        {
          question: "Apa yang harus dilakukan jika lupa password?",
          answer: 'Klik "Lupa Password" dan ikuti instruksi yang diberikan.',
        },
        {
          question: "Apakah bisa mengirim bukti foto?",
          answer:
            "Ya, Anda bisa upload foto sebagai bukti saat membuat pengaduan.",
        },
        {
          question: "Bisakah mengubah data pengaduan yang sudah dikirim?",
          answer:
            "Tidak bisa, namun Anda dapat membuat pengaduan baru dengan data yang benar.",
        },
        {
          question: "Apakah data saya aman?",
          answer:
            "Ya, data Anda kami simpan dan kelola sesuai ketentuan privasi.",
        },
        {
          question: "Siapa yang menangani pengaduan saya?",
          answer:
            "Pengaduan Anda akan ditindaklanjuti oleh petugas terkait dari instansi tujuan.",
        },
        {
          question: "Apakah saya akan mendapatkan notifikasi aduan",
          answer:
            "Ya, notifikasi akan dikirim lewat aplikasi telegram via chat.",
        },
        {
          question: "Apa saja jenis pengaduan yang bisa saya kirimkan?",
          answer:
            "Jenis aduan dapat dilihat di kategori saat anda membuat aduan.",
        },
      ],
    };
  },
  computed: {
    filteredFaqs() {
      const q = this.searchQuery.trim().toLowerCase();
      return this.faqs.filter(
        (faq) =>
          faq.question.toLowerCase().includes(q) ||
          faq.answer.toLowerCase().includes(q)
      );
    },
    visibleFaqs() {
      if (this.searchQuery !== "") {
        return this.filteredFaqs;
      }
      return this.showAll
        ? this.filteredFaqs
        : this.filteredFaqs.slice(0, this.maxVisible);
    },
  },
};
</script>

<style scoped>
.card {
  transition: transform 0.2s;
}
.front-card {
  position: relative;
  z-index: 2;
}

.behind-card {
  position: relative;
  z-index: 1;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 5px 9px rgba(0, 0, 0, 0.158) !important;
}

.btn:hover {
  background-color: var(--nav-color);
  box-shadow: 0 5px 15px rgba(60, 0, 255, 0.298);
}
.link-github {
  text-decoration: none;
  color: inherit;
}
.shadow-sm {
  box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
}
</style>
