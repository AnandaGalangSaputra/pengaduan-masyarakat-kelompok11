<template>
    <div class="con-card card shadow-sm h-100">
        <div class="card-body text-start">
            
            <h5 class="card-title text-white text-center fw-bold">{{ judul }}</h5>
            <p class="card-text text-start text-white">{{ deskripsi }}</p>

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
    font-weight: 900px;
    font-size: 18px;
    letter-spacing: 4%;
    margin-top: 5px;
    margin-bottom: 5px;
}

.card-logo {
    font-size: 18px;
}

.card-body {
    padding: 38px 38px;
}

.con-card {
    width: 310px;
    height: 232px !important;
    border-radius: 29px;
    background-color: #4B70F5;
}

.card-text {
    font-size: 16px;
    line-height: 150%;
    letter-spacing: 0% !important;
    margin-bottom: 30px !important;
}
</style>
