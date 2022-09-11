<template>
<q-layout view="lHh Lpr lFf" class="shadow-2 rounded-borders">
  <TheLoader :isLoading='isLoading'/>
    <!-- <q-footer>
      <img src="ByInfotec_white.svg" width="150" style="margin-bottom: 5px; margin-top: 10px; margin-left: 150px;">
    </q-footer> -->
  <div class="window-height window-width row justify-center items-center">
    <div class="justify-center items-center">
      <div class="row q-col-gutter-sm text-center">
        <q-form ref="loginForm" class="q-gutter-lg login-form">
          <!-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div style="width:300px"></div>
            <q-img v-if="config.file_id" :src="`${this.$axios.defaults.baseURL}/api/files/image/${config.file_id}`" spinner-color="white" width="150"/>
            <q-img v-if="!config.file_id" src="INSABI.png" width="150px"/>
          </div> -->
          <div class="col-12 text-center">
            <span class="text-bold"> Sistema de Administración y Gestión de Tatuajes</span> <br>
            <span class="text-bold">Versión 0.0</span>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input class="userInput" square filled outlined label="Usuario" v-model="credentials.username"/>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-input class="passwordInput" square filled :type="isPwd ? 'password' : 'text'"  outlined label="Contraseña"
            v-model="credentials.password">
               <template v-slot:append>
                <q-icon
                  :name="isPwd ? 'visibility_off' : 'visibility'"
                  class="cursor-pointer"
                  @click="isPwd = !isPwd"/>
              </template>
            </q-input>
          </div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <q-btn @click="login(credentials)" class="loginBtn" outline rounded color="primary" label="Acceder" />
          </div>
          <!-- <div class="col-xs-12 col-sm-12 col-md-12">¿No tienes cuenta?
            <router-link to="/register">Crea una.</router-link>
          </div> -->
        </q-form>
      </div>
    </div>
  </div>
</q-layout>
</template>

<script setup>
import TheLoader from 'src/components/TheLoader.vue'
import { onMounted, ref } from 'vue';
import { useAuth } from 'src/composables/auth/useAuth'

const credentials = ref({ username: null, password: null })
const isPwd = ref(true)
// const isLoading = ref(false)
const { login, isLoading } = useAuth()

// const loginUser = () => {
//   login(credentials)
// }

// const name = computed(() => useUserStore.name)
// console.log(name)

//  onMounted(() => {
//     console.log('desde el mounted')
//  })

//  const showPassword() => {
//   isPwd = !isPwd
//  }
</script>

<style>

</style>