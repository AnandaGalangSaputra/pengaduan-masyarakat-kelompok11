<template>


        <div class="con-card card shadow-sm h-100">
            <div class="card-body bg-blue text-start">
                
                <h5 class="card-title text-white text-center fw-bold">{{ judul }}</h5>
                <p class="card-text text-center fw-light my-3 text-white">{{ deskripsi }}</p>
                
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
    font-size: 24px;
    letter-spacing: 4%;
    margin-top: 2px;
    margin-bottom: 5px;
}


.card-body {
    height: 300px;
    width: 620px;
    padding: 38px 38px;
    border-radius: 29px
}
.con-card{
    border-radius: 29px;
    width: 620px !important;

}
.card-text {
    font-size: 24px;
    line-height: 150%;
    letter-spacing: 0% !important;
    margin-bottom: 30px !important;
}
</style>
