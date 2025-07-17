<template>
    <section class="form-pengaduan">
        <div class="img-container"></div>
        <div class="container relative">
            <div v-if="showError" class="alert alert-danger position-fixed bottom-0 end-0 m-3" role="alert">
                {{ errorMessage }}
            </div>
            <div v-if="showSuccess" class="alert alert-success position-fixed bottom-0 end-0 m-3" role="alert">
                Berhasil mengirimkan aduan, terus ikuti perkembangan laporan anda di halaman pengguna
            </div>

            <header class="row">
                <div class="col-12">
                    <h1 class="text-judul text-center text-light" data-aos="fade-up" data-aos-duration="1000">
                        Laporkan Pengaduan <br />
                        Anda Sekarang
                    </h1>
                    <div class="border-primary mx-auto mb-4" style="width: 20rem; border-bottom: 3px solid;"
                        data-aos="fade-up" data-aos-duration="1000" data-aos-delay="200"></div>
                    <p class="text-center text-light mb-4" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="400">
                        Isilah form di bawah ini dengan informasi yang jelas dan lengkap agar laporan Anda bisa segera
                        diproses.
                    </p>

                    <div class="card border-0 shadow-lg my-5 p-4 rounded-0" data-aos="fade-up" data-aos-duration="1000"
                        data-aos-delay="600">
                        <div class="card-body">
                            <form @submit.prevent="handleConfirm">
                                <div class="mb-4">
                                    <label for="judul" class="form-label">Judul Laporan</label>
                                    <input type="text" class="form-control" id="judul" v-model="judul"
                                        placeholder="Masukkan judul laporan" />
                                </div>

                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama Anda</label>
                                    <input type="text" class="form-control" id="nama" v-model="nama"
                                        placeholder="Masukkan Nama Anda" />
                                </div>

                                <div class="mb-4">
                                    <label for="telegram" class="form-label">Username Telegram</label>
                                    <input type="text" class="form-control" id="telegram" v-model="telegram_username"
                                        placeholder="@username Telegram (wajib kirim pesan /start terlebih dahulu)" />
                                </div>

                                <p class="mb-4 text-danger">
                                    *Mohon kirim Pesan ke @LayananAduan_Bot terlebih dahulu sebelum memberikan laporan.
                                </p>

                                <div class="mb-4">
                                    <label for="ktp" class="form-label">Nomor KTP</label>
                                    <input type="text" class="form-control" id="ktp" v-model="ktp"
                                        placeholder="Masukkan Nomor KTP" />
                                </div>

                                <div class="mb-4">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <select class="form-select" id="kategori" v-model="kategori">
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        <option v-for="kat in kategoriList" :key="kat.id" :value="kat.nama_kategori">
                                            {{ kat.nama_kategori }}
                                        </option>
                                    </select>
                                </div>

                                <div class="mb-4">
                                    <label for="lokasi" class="form-label">Lokasi Kejadian</label>
                                    <input type="text" class="form-control" id="lokasi" v-model="lokasi"
                                        placeholder="Masukkan lokasi kejadian" />
                                </div>

                                <div class="mb-4">
                                    <label for="isi_laporan" class="form-label">Isi Laporan</label>
                                    <textarea class="form-control" id="isi_laporan" v-model="isi_laporan" rows="10"
                                        placeholder="Tuliskan detail laporan Anda"></textarea>
                                </div>

                                <div class="mb-4">
                                    <label for="foto" class="form-label">Bukti Foto</label>
                                    <input type="file" class="form-control" id="foto" @change="handleFileUpload"
                                        accept="image/*" />
                                </div>

                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" v-model="agree" id="agreement" />
                                    <label class="form-check-label" for="agreement">
                                        Saya menyetujui bahwa data yang saya masukkan adalah benar dan dapat
                                        dipertanggungjawabkan.
                                    </label>
                                </div>

                                <button type="submit" class="btn-sub btn btn-primary w-100 mt-3">Kirim Pengaduan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Modal Konfirmasi Modern -->
            <div v-if="showConfirmModal" class="modal-overlay">
                <div class="modal-modern">
                    <h5 class="modal-title mb-3">Konfirmasi Laporan</h5>
                    <p class="modal-text">
                        Dengan ini saya menyatakan bahwa semua data dan laporan yang saya kirim adalah benar. Jika
                        terbukti memberikan laporan palsu, saya siap bertanggung jawab secara hukum sesuai peraturan
                        perundang-undangan yang berlaku.
                    </p>
                    <div class="modal-actions">
                        <button class="btn btn-outline-secondary" @click="showConfirmModal = false">Batal</button>
                        <button class="btn btn-primary" @click="confirmSubmit">Kirim Sekarang</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            judul: '',
            nama: '',
            telegram_username: '',
            ktp: '',
            kategori: '',
            lokasi: '',
            isi_laporan: '',
            foto: null,
            agree: false,
            showError: false,
            errorMessage: '',
            showSuccess: false,
            kategoriList: [],
            showConfirmModal: false,
        };
    },
    methods: {
        handleFileUpload(event) {
            this.foto = event.target.files[0];
        },

        async handleConfirm() {
            if (!this.judul || !this.nama || !this.ktp || !this.kategori ||
                !this.lokasi || !this.isi_laporan || !this.agree || !this.foto || !this.telegram_username) {
                this.errorMessage = 'Semua field harus diisi dan persetujuan harus dicentang.';
                this.showError = true;
                setTimeout(() => (this.showError = false), 3000);
                return;
            }

            // Validasi username telegram ke backend
            try {
                const res = await fetch(`http://127.0.0.1:8000/api/cek-telegram/${this.telegram_username}`);
                const result = await res.json();
                if (!res.ok || !result.valid) {
                    this.errorMessage = `Username Telegram "${this.telegram_username}" tidak ditemukan.`;
                    this.showError = true;
                    setTimeout(() => (this.showError = false), 3000);
                    return;
                }
            } catch (e) {
                this.errorMessage = "Gagal memvalidasi Telegram. Coba lagi.";
                this.showError = true;
                setTimeout(() => (this.showError = false), 3000);
                return;
            }

            this.showConfirmModal = true;
        },

        confirmSubmit() {
            this.showConfirmModal = false;
            this.submitForm();
        },

        async submitForm() {
            try {
                const formData = new FormData();
                formData.append('judul_laporan', this.judul);
                formData.append('nama', this.nama);
                formData.append('telegram_username', this.telegram_username);
                formData.append('ktp', this.ktp);
                formData.append('kategori', this.kategori);
                formData.append('lokasi_kejadian', this.lokasi);
                formData.append('isi_laporan', this.isi_laporan);
                formData.append('bukti_foto', this.foto);
                formData.append('setuju', '1');

                const response = await fetch('http://127.0.0.1:8000/api/pengaduan', {
                    method: 'POST',
                    body: formData
                });

                if (!response.ok) {
                    throw new Error("Gagal mengirim data");
                }

                await response.json();
                this.showSuccess = true;
                setTimeout(() => (this.showSuccess = false), 3000);

                // Reset semua field
                this.judul = '';
                this.nama = '';
                this.telegram_username = '';
                this.ktp = '';
                this.kategori = '';
                this.lokasi = '';
                this.isi_laporan = '';
                this.foto = null;
                this.agree = false;
                document.getElementById('foto').value = '';
            } catch (error) {
                this.errorMessage = 'Gagal mengirim data. Coba lagi nanti.';
                this.showError = true;
                setTimeout(() => (this.showError = false), 3000);
            }
        },

        async fetchKategori() {
            try {
                const response = await fetch('http://127.0.0.1:8000/api/kategori');
                if (!response.ok) throw new Error("Gagal mengambil data kategori");
                this.kategoriList = await response.json();
            } catch (error) {
                console.error('Error fetching kategori:', error);
            }
        }
    },

    mounted() {
        this.fetchKategori();
    }
};
</script>

<style scoped>
.alert {
    z-index: 999;
}

header {
    padding-top: 8rem;
}

.btn-sub {
    height: 60px;
}

.img-container {
    background-image: url('../assets/Images/bgindo.png');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 40rem;
    width: 100%;
    z-index: -1;
}

.form-pengaduan {
    position: relative;
}

.text-judul {
    font-weight: bold !important;
    font-size: 3em;
}

.container {
    padding: 0 5rem !important;
}

@media (max-width: 768px) {
    .img-container {
        height: 35rem;
    }

    .container {
        padding: 1rem !important;
    }
}

.modal-overlay {
    position: fixed;
    inset: 0;
    background: rgba(0, 0, 0, 0.6);
    z-index: 9999;
    display: flex;
    align-items: center;
    justify-content: center;
}

.modal-modern {
    background: #ffffff;
    border-radius: 12px;
    padding: 2rem;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    animation: fadeInScale 0.3s ease;
}

.modal-title {
    font-weight: bold;
    font-size: 1.3rem;
}

.modal-text {
    color: #333;
    font-size: 1rem;
    line-height: 1.5;
    margin-bottom: 1.5rem;
}

.modal-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
}

@keyframes fadeInScale {
    0% {
        opacity: 0;
        transform: scale(0.95);
    }

    100% {
        opacity: 1;
        transform: scale(1);
    }
}
</style>
