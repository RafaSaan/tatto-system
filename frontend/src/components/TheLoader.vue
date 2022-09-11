<template>
  <div v-if="isLoading" class="loaderContainer q-page">
    <div class="center">
      <div class="imagesContainer center">
        <img class="loader-img" src="src\assets\img\74856-tattoo-machine-unscreen.gif" alt="Loading" />
        <img class="loaderCircle" src="src\assets\img\96634-circle-loader-black-unscreen.gif" alt="Loading" />
      </div>
      <p class="text-body1 text-white">{{message}}</p>
    </div>

  </div>
</template>

<script setup>

const props = defineProps({
  message: {
    type: String,
    default: 'Cargando contenido, por favor espere...'
  },
  isLoading: {
    required: true,
    type: Boolean,
    default: false
  },
})

</script>

<style>
.loaderContainer {
  position: fixed;
  width: 100vw;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgba(0, 0, 0,0.3);
  z-index: 999;
}
.center{
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.imagesContainer{
  position: relative;
}
.loader-img{
  position: absolute;
  width: 140px;
  height: 140px;
  margin-top: 1.5rem;
  margin-left: 1.4rem;
}
.loaderCircle{
 position: relative;
 width: 190px;
 height: 190px;
}
</style>