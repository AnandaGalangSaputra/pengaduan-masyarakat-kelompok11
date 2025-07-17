<template>
    <div class="card h-100 text-white p-3">
        <div class="my-3 mx-3 d-flex">
            <h1 class="display-4 fw-bold me-3">{{ nomor }}</h1>
            <div>
                <h5 class="fw-bold">{{ judul }}</h5>
                <p class="mb-0" style="font-size: 0.95rem">
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
    border-radius: 20px;
    max-width: 310px;
    max-height: 232px;
}
</style>
