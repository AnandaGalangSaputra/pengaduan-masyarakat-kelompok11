<style scoped>
.BlackButtonOutline {
  /* padding: 15px 30px; */
  padding: 1rem 2rem ;
}
</style>

<template>
  <a class="BlackButtonOutline btn btn-outline-dark btn-lg hoverable">
    <span :class="{ '': icon }">{{ text }}</span>
    <i v-if="icon" :class="['fa', icon]" class="ms-3"></i>
  </a>
</template>

<script>
export default {
  name: "BlackButtonOutline",
  props: {
    text: {
      type: String,
      default: "apalah",
    },
    link: {
      type: String,
      default: "./Form-Pengaduan/index.html",
    },
    icon: {
      type: String,
      default: "",
    },
  },
};
</script>
