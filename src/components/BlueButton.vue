<style scoped>

  .button-blue {
    padding: 1rem 2rem ;
    background-color: var(--blue-color);
  }

</style>

<template>
    <a
        class="button-blue btn btn-lg hoverable me-2 text-white"
        
    >
        <span :class="{ '': icon }">{{ text }}</span>
        <i v-if="icon" :class="['fa', icon]" class="ms-2"></i>
    </a>
</template>

<script>
export default {
        name: 'BlueButton',
        props: {
                text: {
                        type: String,
                        default: 'apalah'
                },
                link: {
                        type: String,
                        default: './Form-Pengaduan/index.html'
                },
                icon: {
                        type: String,
                        default: ''
                }
        }
}
</script>
