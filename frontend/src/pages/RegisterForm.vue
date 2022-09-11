<template>
  <q-layout view="lHh Lpr lFf" class="shadow-2 rounded-borders">
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
              <q-input square filled outlined label="Nombre" v-model="userStore.name"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square filled outlined label="Primer apellido" v-model="userStore.last_name"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square filled outlined label="Username" v-model="userStore.username"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square filled outlined label="Correo Electronico" v-model="userStore.email"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-input square filled :type="isPwd ? 'password' : 'text'"  outlined label="Contraseña"
              v-model="userStore.password">
                 <template v-slot:append>
                  <q-icon
                    :name="isPwd ? 'visibility_off' : 'visibility'"
                    class="cursor-pointer"
                    @click="isPwd = !isPwd"/>
                </template>
              </q-input>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
              <q-btn class="loginBtn" outline rounded color="primary" label="Registrarme" @click="register(userStore.$state)"/>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">¿Ya tienes cuenta?
              <router-link to="/login">Inicia Sesion.</router-link>
            </div>
          </q-form>
        </div>
      </div>
    </div>
</q-layout>
</template>

<script setup>
// import { axiosInstance } from 'src/boot/axios'
import { onMounted, ref } from 'vue';
import { useAuth } from 'src/composables/auth/useAuth'
import { useUserStore } from 'src/stores/modules/userStore'

const { register  } = useAuth()
const userStore = useUserStore()
const isPwd = ref(true)

// const credentials = ref({ name: null, last_name: null, second_name: null,username: null, email: null, password: null })

// const login = () => {
//   const basePath = '/api';
//   const URL = `${basePath}/registerUser`;
//   axiosInstance.post(URL, credentials.value).then((res) => {
//     console.log(res)
//   })
// }

</script>

<style>

</style>