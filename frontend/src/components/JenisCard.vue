<template>
    <div class="con-card card shadow-sm h-100">
        <div class="card-body bg-blue text-center">
            <div class="">
                <h5 class="card-title text-white text-center fw-bold">
                    {{ judul }}
                </h5>
            </div>
            <div
                class="des d-flex flex-column justify-content-center align-items-center"
            >
                <p class="card-text text-center fw-light my-3 text-white">
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
.des {
    min-height: 200px;
}

.card-body {
 
    padding: 30px 45px;
    border-radius: 29px;
    height: 100%;
    width: 100%;
}
.con-card {
    border-radius: 29px;
    /* width: 620px !important; */
    height: 100%;
    max-width: 100%;
}
.card-text {
    font-size: 20px;
    line-height: 150%;
    letter-spacing: 0% !important;
    margin-bottom: 30px !important;
}
</style>
