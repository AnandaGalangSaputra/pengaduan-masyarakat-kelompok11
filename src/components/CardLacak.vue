<template>
    <div class="con-card card shadow-lg  h-100">
        <div class="card-body text-start">
            
            <h5 class="card-title text-primary fw-bold">{{ judul }}</h5>
            <p class="card-text text-secondary">{{ deskripsi }}</p>
        </div>
    </div>
</template>

<script>
export default {
    name: "CardLacak",
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

.card-body {
    padding: 48px 48px;
    width: 405px;
    height: 402px;
}

.con-card {
    border-radius: 16px;
}

.card-text {
    font-style: 20px;
    line-height: 30px;
    letter-spacing: 4%;
    margin-bottom: 30px !important;
}
</style>

