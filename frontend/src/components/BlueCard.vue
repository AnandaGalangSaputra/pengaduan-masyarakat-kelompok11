<template>
    <div class="card h-100 text-white">
        <div class="kart px-5 d-flex">
            <h1 class="display-4 fw-bold me-2">{{ nomor }}</h1>
            <div>
                <h5 class="fw-bold">{{ judul }}</h5>
                <p class="mb-0" style="font-size: 16px">
                    {{ deskripsi }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLayanan",
    props: {
        judul: String,
        deskripsi: String,
        nomor: String,
    },
};
</script>

<style scoped>
.card {
    background-color: #4a67f6;
    border-radius: 19px;
    height: 189px !important;
}

.kart {
    height: 100%;
    padding-top: 29px;
    padding-bottom: 29px;
}

@media (max-width: 1286px) {
    .card {
        min-height: 200px;
    }

    h5 {
        font-size: 16px;
    }
    h1 {
        font-size: 33px;
    }

    p {
        font-size: 16px !important;
    }

    .kart {
        margin-left: 5px !important ;
        margin-right: 5px !important;
        padding-top: 28px;
        padding-left: 20px !important;
        padding-right: 20px !important;
    }
}

@media screen and (max-width: 767px) {
    .card {
        min-height: 100px;
        max-height: 200px;
    }
    p {
        font-size: 12.8px !important;
    }
     h5 {
        font-size: 15px;
    }
    h1 {
        font-size: 32px;
    }
}

@media screen and (max-width: 575px) {
    .card {
        min-height: 100px;
        max-height: 200px;
    }
    p {
        font-size: 15px !important;
    }
     h5 {
        font-size: 19px;
    }
    h1 {
        font-size: 39px;
    }
}
</style>
