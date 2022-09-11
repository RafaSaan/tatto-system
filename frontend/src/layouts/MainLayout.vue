<template>
  <q-layout view="lHh Lpr lFf">
    <q-header elevated>
      <q-toolbar>
        <q-btn
          flat
          dense
          round
          icon="menu"
          aria-label="Menu"
          @click="toggleLeftDrawer"
        />
        <q-toolbar-title
          class="cursor-pointer"
          @click="$router.push('/').catch(err => {})">
          BEA SYSTEM
        </q-toolbar-title>

        <div class="q-pl-md q-gutter-sm row no-wrap items-center">
          <q-btn
            round
            dense
            flat
            size="md"
            icon="fa-solid fa-bell"
            >
            <q-tooltip>Notificaciones</q-tooltip>
          </q-btn>
          <q-btn
            class="avatar"
            round
            flat>
            <q-avatar size="lg">
               <img src="https://cdn.quasar.dev/img/boy-avatar.png"/>
               <q-tooltip>Perfil</q-tooltip>
            </q-avatar>
            <q-menu>
              <div class="row no-wrap q-pa-md">
                <div class="column q-gutter-xs">
                  <q-avatar size="100px">
                     <img src="https://cdn.quasar.dev/img/boy-avatar.png"/>
                  </q-avatar>
                  <br/>
                  <q-btn
                    data-cy="btnLogout"
                    color="primary"
                    label="Configuración"
                    push
                    size="sm"
                    to="configuration"
                  />
                  <q-btn
                    data-cy="btnLogout"
                    color="primary"
                    label="Logout"
                    push
                    size="sm"
                    v-close-popup
                    @click="IsCloseSession = true;"
                  />
                </div>
              </div>
            </q-menu>
          </q-btn>
        </div>
      </q-toolbar>
    </q-header>

    <q-drawer
      v-model="leftDrawerOpen"
      show-if-above
      bordered
    >
      <q-list separator bordered >
        <q-item-label
          header
        >
          Modulos / Secciones
        </q-item-label>

        <EssentialLink
          v-for="link in essentialLinks"
          :key="link.title"
          v-bind="link"
        />
      </q-list>
    </q-drawer>

    <q-page-container>
      <router-view />
    </q-page-container>
  </q-layout>
</template>

<script>
import { defineComponent, ref } from 'vue'
import EssentialLink from 'components/EssentialLink.vue'

const linksList = [
  {
    title: 'Calendario',
    caption: 'Consultar citas',
    icon: 'fa-solid fa-calendar-days',
    link: 'calendar'
  },
  {
    title: 'Balance',
    caption: 'Gastos / ganancias',
    icon: 'fa-solid fa-money-bill-trend-up',
    link: 'balance'
  },
  {
    title: 'Insumos',
    caption: 'Administracion de insumo',
    icon: 'fa-solid fa-syringe',
    link: 'supplies'
  },
]

export default defineComponent({
  name: 'MainLayout',

  components: {
    EssentialLink
  },

  setup () {
    const leftDrawerOpen = ref(false)

    return {
      essentialLinks: linksList,
      leftDrawerOpen,
      toggleLeftDrawer () {
        leftDrawerOpen.value = !leftDrawerOpen.value
      }
    }
  }
})
</script>
