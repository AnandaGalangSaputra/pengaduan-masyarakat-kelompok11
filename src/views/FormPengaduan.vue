<template>
    <section class="form-pengaduan">
        <div class="img-container"></div>
        <div class="container relative">
            <div v-if="showError" class="alert alert-danger position-fixed bottom-0 end-0 m-3" role="alert">
                Semua field harus diisi dan persetujuan harus dicentang.
            </div>
            <div v-if="showSuccess" class="alert alert-success position-fixed bottom-0 end-0 m-3" role="alert">
                Berhasil mengirimkan aduan, terus ikuti perkembangan laporan anda di halaman pengguna
            </div>
            <header class="row">
                <div class="col-12"           >
                    <h1 class="text-judul text-center text-light" data-aos="fade-up"
                    data-aos-duration="1000">
                        Laporkan Pengaduan <br />
                        Anda Sekarang
                    </h1>
                    <div class="border-primary mx-auto mb-4 " style="width: 20rem; border-bottom: 3px solid;" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="200"></div>
                    <p class="text-center text-light mb-4" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="400">
                        Isilah form di bawah ini dengan informasi yang jelas dan lengkap agar laporan Anda bisa segera
                        diproses.
                    </p>
                    <div class="card border-0 shadow-lg my-5 p-4 rounded-0" data-aos="fade-up"
                    data-aos-duration="1000" data-aos-delay="600">
                        <div class="card-body">
                            <form @submit.prevent="submitForm">
                                <div class="mb-4">
                                    <label for="nama" class="form-label">Nama Anda</label>
                                    <input type="text" class="form-control" id="nama" v-model="nama"
                                        placeholder="Masukkan Nama Anda">
                                </div>
                                <div class="mb-4">
                                    <label for="noKtp" class="form-label">Nomor KTP</label>
                                    <input type="text" class="form-control" id="noKtp" v-model="noKtp"
                                        placeholder="Masukkan Nomor KTP">
                                </div>
                                <div class="mb-4">
                                    <label for="keluhan" class="form-label">Keluhan</label>
                                    <textarea class="form-control" id="keluhan" v-model="keluhan" rows="15"
                                        placeholder="Tuliskan keluhan Anda"></textarea>
                                </div>

                                <div class="d-flex justify-content-between my-5 gap-3 jenis">
                                    <label class="btn btn-lg w-100 py-5 btn-outlie-dark"
                                        :class="{ 'btn-primary': selectedOption === 'anonim' }">
                                        <input type="radio" name="reportType" value="anonim" v-model="selectedOption"
                                            class="d-none">
                                        <i class="fas fa-user-secret fa-2x mb-2"></i>
                                        <div>Anonim</div>
                                    </label>
                                    <label class="btn btn-lg w-100 py-5"
                                        :class="{ 'btn-primary': selectedOption === 'terbuka' }">
                                        <input type="radio" name="reportType" value="terbuka" v-model="selectedOption"
                                            class="d-none">
                                        <i class="fas fa-users fa-2x mb-2"></i>
                                        <div>Terbuka</div>
                                    </label>
                                </div>

                                <div class="form-check mt-4">
                                    <input class="form-check-input" type="checkbox" v-model="agree" id="agreement">
                                    <label class="form-check-label" for="agreement">
                                        Saya menyetujui bahwa data yang saya masukkan adalah benar dan dapat
                                        dipertanggungjawabkan
                                    </label>
                                </div>

                                <button type="submit" class="btn-sub btn btn-primary w-100 mt-3">
                                    Kirim Pengaduan
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </header>
        </div>
    </section>
</template>



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

.jenis label {
    border: 2px solid rgb(234, 236, 240);
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
</style>

<script>
export default {
    data() {
        return {
            noKtp: '',
            nama: '',
            keluhan: '',
            agree: false,
            selectedOption: '',
            showError: false,
            showSuccess: false
        }
    },
    methods: {
        submitForm() {
            if (!this.noKtp || !this.keluhan || !this.selectedOption || !this.agree) {
                this.showError = true
                this.autoHideAlert('error')
            } else {
                this.showError = false
                this.showSuccess = true
                this.autoHideAlert('success')

                // Simulasi pengiriman data
                console.log({
                    nama: this.nama,
                    noKtp: this.noKtp,
                    keluhan: this.keluhan,
                    jenisLaporan: this.selectedOption
                })

                // Reset form
                this.nama = ''
                this.noKtp = ''
                this.keluhan = ''
                this.selectedOption = ''
                this.agree = false
            }
        },
        autoHideAlert(type) {
            setTimeout(() => {
                if (type === 'error') this.showError = false
                if (type === 'success') this.showSuccess = false
            }, 3000)
        }
    }
}


</script>