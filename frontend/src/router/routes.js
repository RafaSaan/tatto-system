import Admin from 'src/modules/Admin/router'
import Balance from 'src/modules/Balance/router'
import Calendar from 'src/modules/Calendar/router'
import Configuration from 'src/modules/Configuration/router'
import Supplies from 'src/modules/Supplies/router'

const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      {
        path: '', component: () => import('pages/IndexPage.vue'),
      },
      ...Admin,
      ...Calendar,
      ...Configuration,
      ...Balance,
      ...Supplies,
    ],
    beforeEnter: (to, from, next) => {
      const prefix = `grp_token_${import.meta.env.VITE_FOLDER_PATH}`.replace('/', '_')
      if (sessionStorage.getItem(prefix)) {
        next();
      } else {
        next('/login');
      }
    },
  },
  {
    path: '/login',
    component: () => import('pages/LoginPage.vue'),
    beforeEnter: (to, from, next) => {
      if (sessionStorage.getItem('grp_token')) {
        next('/');
      } else {
        next();
      }
    },
    children: [
      { path: '', component: () => import('pages/IndexPage.vue') },
    ],
  },
  {
    path: '/register',
    name: 'registerUser',
    component: () => import('pages/RegisterForm.vue')
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
