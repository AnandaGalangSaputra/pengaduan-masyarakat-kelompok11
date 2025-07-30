<style scoped>
.WhiteButtonOutline {
  padding: 0.5rem 1rem ;
  color : rgb(255, 255, 255);
  border: 2px solid #ffffff;
  border-radius: 0;
}

.WhiteButtonOutline:hover {
  color: var(--nav-color);
  background: #ffffff;
  border: 2px solid var(--nav-color);
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
  transition: 0.2s ease-in-out;
}
</style>

<template>
  <a class="btn btn WhiteButtonOutline hoverable">
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
