import { ref } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { axiosInstance } from 'src/boot/axios'
import { notifySuccess, notifyError } from 'src/utils/notify';

export const useAuth = () => {
    const router = useRouter()
    const basePath = '/api';
    const isLoading = ref(false) 
    
    const login = async (credentials) => {
        isLoading.value = true
        const URL = `${basePath}/login`;
        await axiosInstance.post(URL, credentials).then(resp => {
            const userData = resp.data.user;
            // context.commit('setUserInformation', userData)
            const prefix = `grp_token_${import.meta.env.VITE_FOLDER_PATH}`.replace('/', '_')
            window.sessionStorage.setItem(prefix, resp.data.grp_token);
            window.sessionStorage.setItem(`${prefix}_expiration`, resp.data.grp_token_expiration);
            window.sessionStorage.setItem(`${prefix}_permissions`, JSON.stringify(userData.permissions))
            axiosInstance.defaults.headers.common.Authorization = `Bearer ${resp.data.grp_token}`;
            notifySuccess()
            router.push('/');
        }).catch(error => {
            notifyError()
        }).finally(() => {
            isLoading.value = false
        })
    }
    const register = async (credentials) => {
        const URL = `${basePath}/registerUser`;
        console.log(credentials)
        await axiosInstance.post(URL, credentials).then(resp => {
            notifySuccess()
        }).catch(error => {
            notifyError()
        })
    }

    return {
        // properties
        isLoading,
        // methods
        register,
        login
    }
}