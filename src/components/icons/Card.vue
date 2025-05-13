<template>
    <div class="con-card card shadow-lg  h-100">
        <div class="card-body text-start">
            <p class="card-logo fw-bold mb-4">LOGO</p>
            <h5 class="card-title fw-bold">{{ judul }}</h5>
            <p class="card-text text-muted">{{ deskripsi }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLayanan",
    props: {
        judul: String,
        deskripsi: String,
    },
    
};
</script>

<style scoped>
.card-title {
    font-weight: 800;
    font-size: 32px;
    letter-spacing: 4%;
    margin-top: 30px;
    margin-bottom: 30px;
}

.card-logo {
    font-size: 18px;
    color: black;
}

.card-body {
    padding: 48px 48px;
}

.con-card {
    width: 405px;
    height: 402px;
    border-radius: 16px;
}

.card-text {
    font-style: 20px;
    line-height: 30px;
    letter-spacing: 4%;
    margin-bottom: 30px !important;
}
</style>

