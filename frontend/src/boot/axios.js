import axios from 'axios';
// al usar vite las importaciones env son = import.meta.env.
const prefix = `grp_token_${import.meta.env.VITE_FOLDER_PATH}`.replace('/', '_')
const axiosInstance = axios.create({
  baseURL: `${import.meta.env.VITE_BASE_URL}`,
  headers: {
    'Content-Type': 'application/json',
  },
});

const token = sessionStorage.getItem(prefix);

if (token) {
  axiosInstance.interceptors.request.use(((config) => {
    config.headers.Authorization = `Bearer ${token}`;
    return config;
  }));
}

axiosInstance.interceptors.response.use(
  (response) => response,
  // eslint-disable-next-line consistent-return
  (error) => {
    if (error.response.status === 401 || error.response.status === 503) {
      let redirect = false
      if (sessionStorage.getItem(prefix)) {
        redirect = true
      }
      sessionStorage.removeItem(prefix);
      sessionStorage.removeItem(`${prefix}_expiration`);
      if (redirect || error.response.status === 401) {
        // Vue.$router.push(`/${process.env.FOLDER_PATH}login`);
        // console.log(`/${process.env.FOLDER_PATH}login`);
        window.location = `${import.meta.env.VITE_FOLDER_PATH}login`
      }
    } else {
      return Promise.reject(error);
    }
  }
);
// for use inside Vue files through this.$axios
// Vue.prototype.$axios = axiosInstance;
export { axiosInstance }
