import { defineStore } from 'pinia';

export const useUserStore = defineStore('user', {
  state: () => ({
    name: null,
    last_name: null,
    second_name: null,
    username: null,
    email: null,
    password: null,
    email_verified_at: null,
    is_first_time: true,
    is_active: true,
    profile_id: null,
    remember_token: null,
  }),
  getters: {
    doubleCount: (state) => state.counter * 2,
  },
  actions: {
    increment() {
      this.counter++;
    },
  },
});
