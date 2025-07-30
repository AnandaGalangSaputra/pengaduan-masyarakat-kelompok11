<template>
  <section class="min-vh-100 py-5">
    <div class="container d-flex justify-content-center">
      <div class="row d-flex justify-content-center">
        <div class="col-md-12">
          <h3 class="text-judul fw-bold text-center" data-aos="fade-down" data-aos-delay="600">
            Ketahui Kemajuan Pengaduan Anda <br />
            Pelacakan Cepat dan Transparansi Informasi Pengaduan
          </h3>
        </div>
        <div class="col-md-7 pt-4">
          <p class="text-isi text-center fw-normal" data-aos="fade-down" data-aos-delay="500">
            Masukkan nomor tiket pengaduan dan KTP Anda untuk <br />
            melacak status pengaduan yang telah disampaikan.
          </p>
        </div>
        <div class="col-md-12 d-flex justify-content-center my-5">
          <form @submit.prevent="lacakPengaduan">
            <div class="mb-3 my-5">
              <input type="text" class="form-control" v-model="ktp" placeholder="Masukan KTP Anda" data-aos="zoom-in-up"
                data-aos-delay="400" />
            </div>
            <div class="mb-3 my-3">
              <input type="text" class="form-control" v-model="tiket" placeholder="Masukan tiket pengaduan"
                data-aos="zoom-in-up" data-aos-delay="400" />
            </div>
            <div class="d-flex justify-content-center w-100">
              <BlueButton class="blue-button my-3 w-100" text="Lacak" icon="fa fa-arrow-right" type="submit"
                data-aos="zoom-in-up" data-aos-delay="400" />
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- Alert jika tidak ditemukan -->
    <div v-if="notFound" class="alert alert-danger position-fixed bottom-0 end-0 m-4 z-3" role="alert">
      Pengaduan tidak ditemukan. Periksa kembali KTP dan tiket Anda.
    </div>

    <!-- Modal jika ditemukan -->
    <div v-if="laporan" class="modal fade show d-block" tabindex="-1" role="dialog"
      style="background-color: rgba(0,0,0,0.5)">
      <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content rounded-4 shadow border-0">
          <div class="modal-header border-0 pb-0">
            <h4 class="modal-title fw-bold">Detail Pengaduan</h4>
            <button @click="laporan = null" class="btn-close" aria-label="Close"></button>
          </div>

          <div class="modal-body p-4 pt-0">
            <!-- Status and Basic Info -->
            <div class="d-flex justify-content-between align-items-center mb-4">
              <span :class="`badge ${getStatusClass(laporan.status_laporan)} py-2 px-3`">
                <i :class="getStatusIcon(laporan.status_laporan)" class="me-2"></i>
                {{ laporan.status_laporan }}
              </span>
              <div class="text-muted">
                <small>No. Tiket: {{ laporan.tiket_lacak || 'N/A' }}</small>
              </div>
            </div>

            <!-- Complaint Details -->
            <div class="mb-4">
              <h5 class="fw-bold mb-3">{{ laporan.judul_laporan }}</h5>
              <div class="d-flex flex-wrap gap-3 mb-3">
                <div class="d-flex align-items-center text-muted">
                  <i class="fas fa-tag me-2"></i>
                  <span>{{ laporan.kategori }}</span>
                </div>
                <div class="d-flex align-items-center text-muted">
                  <i class="fas fa-calendar-alt me-2"></i>
                  <span>{{ formatDate(laporan.created_at) }}</span>
                </div>
                <div class="d-flex align-items-center text-muted" v-if="laporan.lokasi_kejadian">
                  <i class="fas fa-map-marker-alt me-2"></i>
                  <span>{{ laporan.lokasi_kejadian }}</span>
                </div>
              </div>

              <div class="card bg-light border-0 p-3 mb-4">
                <p class="mb-0">{{ laporan.isi_laporan }}</p>
              </div>
            </div>

            <!-- Evidence Photo -->
            <div v-if="laporan.bukti_foto" class="mb-4">
              <h6 class="fw-bold mb-3">Bukti Foto</h6>
              <div class="position-relative bg-dark rounded-3 overflow-hidden" style="height: 300px;">
                <img :src="getImageUrl(laporan.bukti_foto)" alt="Bukti Foto"
                  class="img-fluid h-100 w-100 object-fit-contain" />
                <div class="position-absolute bottom-0 end-0 m-3">
                  <a :href="getImageUrl(laporan.bukti_foto)" target="_blank" class="btn btn-sm btn-primary"
                    title="Perbesar">
                    <i class="fas fa-expand"></i>
                  </a>
                  <a :href="getImageUrl(laporan.bukti_foto)" download class="btn btn-sm btn-success ms-2" title="Unduh">
                    <i class="fas fa-download"></i>
                  </a>
                </div>
              </div>
            </div>

                      <!-- Surat Tindakan -->
          <div v-if="laporan.surat_tindak" class="mt-4">
            <h6 class="fw-bold mb-3">Surat Tindakan</h6>
            <div class="d-flex gap-2">
              <a :href="getSuratUrl(laporan.surat_tindak)" target="_blank" class="btn btn-outline-primary">
                <i class="fas fa-file-alt me-2"></i>Lihat Surat
              </a>
              <a :href="getSuratUrl(laporan.surat_tindak)" download class="btn btn-outline-success">
                <i class="fas fa-download me-2"></i>Unduh Surat
              </a>
            </div>
          </div>

            <!-- Response Section -->
            <div v-if="laporan.tanggapan" class="mt-4">
              <h6 class="fw-bold mb-3">Tanggapan Petugas</h6>
              <div class="card border-start border-primary border-3 bg-light">
                <div class="card-body">
                  <p class="mb-0">{{ laporan.tanggapan }}</p>
                  <div v-if="laporan.updated_at" class="text-end text-muted mt-2">
                    <small>Diupdate: {{ formatDate(laporan.updated_at) }}</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0">
            <button @click="laporan = null" class="btn btn-secondary">Tutup</button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="bg">
    <div class="py-5 container">
      <div class="d-flex flex-column gap-4 py-5 flex-md-row justify-content-center">
        <div class="" v-for="(Lacak, index) in lacakList" :key="index" :data-aos="'zoom-in-up'"
          :data-aos-delay="index * 200 + 300">
          <CardLacak :judul="Lacak.judul" :deskripsi="Lacak.deskripsi" />
        </div>
      </div>
    </div>
  </div>
  <FooterBlue />
</template>

<script>
import BlueButton from "@/components/BlueButton.vue";
import CardLacak from "@/components/CardLacak.vue";
import FooterBlue from "@/components/FooterBlue.vue";

export default {
  components: {
    BlueButton,
    CardLacak,
    FooterBlue,
  },
  data() {
    return {
      tiket: "",
      ktp: "",
      laporan: null,
      notFound: false,
      lacakList: [
        {
          judul: "Butuh Bantuan?",
          deskripsi: "Buka Halaman Pusat Bantuan untuk pertanyaan lebih lanjut.",
        },
        {
          judul: "Dapat diakses Kapanpun dan dimanapun",
          deskripsi: "Buka Laporanmu. Kapanpun. Dimanapun.",
        },
        {
          judul: "Pantau Aduan",
          deskripsi: "Lacak status pengaduan secara real-time dari Menu Pantau pengaduan.",
        },
      ],
    };
  },
  methods: {
    async lacakPengaduan() {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/lacak?tiket=${this.tiket}&ktp=${this.ktp}`);
        const data = await response.json();

        if (response.ok && data) {
          this.laporan = data;
          this.notFound = false;
        } else {
          this.notFound = true;
          this.laporan = null;
        }
      } catch (error) {
        console.error("Gagal melacak:", error);
        this.notFound = true;
        this.laporan = null;
      }
    },
    getImageUrl(path) {
      return `http://127.0.0.1:8000/storage/${path}`;
    },
    getSuratUrl(path) {
      return `http://127.0.0.1:8000/storage/surat/${path}`;
    },
    getStatusClass(status) {
      status = status.toLowerCase();
      if (status.includes('diterima')) return 'bg-info text-dark';
      if (status.includes('proses')) return 'bg-warning text-dark';
      if (status.includes('selesai')) return 'bg-success';
      if (status.includes('ditolak')) return 'bg-danger';
      return 'bg-secondary';
    },

    getStatusIcon(status) {
      status = status.toLowerCase();
      if (status.includes('diterima')) return 'fas fa-check-circle';
      if (status.includes('proses')) return 'fas fa-spinner fa-pulse';
      if (status.includes('selesai')) return 'fas fa-check-double';
      if (status.includes('ditolak')) return 'fas fa-times-circle';
      return 'fas fa-info-circle';
    },

    formatDate(dateString) {
      if (!dateString) return '';
      const options = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
      };
      return new Date(dateString).toLocaleDateString('id-ID', options);
    }
  }
};
</script>

<style scoped>
.bg {
  background-color: #eaeaea;
}

.container {
  padding-top: 110px;
}

.modal {
  background-color: rgba(0, 0, 0, 0.37);
}

.modal-dialog {
  max-width: 80%;
  margin: auto;
  padding: 20px;
}

.modal-content {
  background: #ffffff;
  border: none;
}

.detail-item {
  line-height: 1.6;
}

.badge {
  font-weight: 500;
  padding: 0.5em 1em;
}

.btn-close:focus {
  box-shadow: none;
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

@media (max-width: 768px) {
  .form-control {
    width: 200px;
  }
}

input::placeholder,
textarea::placeholder {
  color: #a9a9a9;
}
</style>
