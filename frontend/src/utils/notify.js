import { Notify } from 'quasar'
import { i18n } from 'boot/i18n'

const notifyOptionsSuccess = {
  icon: 'fas fa-smile-beam',
  position: 'bottom-left',
  textColor: 'white',
  color: 'positive'
}

const notifyOptionsMessageSystem = {
  icon: 'fas fa-exclamation-circle',
  position: 'bottom-left',
  textColor: 'white',
  color: 'warning'
}

const notifyOptionsError = {
  icon: 'fas fa-frown',
  position: 'bottom-left',
  textColor: 'white',
  color: 'negative'
}

export const notifySuccess = (message) => {
  Notify.create({
    ...notifyOptionsSuccess,
    message: message !== undefined ? message : i18n.global.messages[i18n.global.locale].success
  })
}

export const notifyMessageSystem = (message) => {
  Notify.create({
    ...notifyOptionsMessageSystem,
    message: message !== undefined ? message : i18n.global.messages[i18n.global.locale].success
  })
}

export const notifyError = (message) => {
  Notify.create({
    ...notifyOptionsError,
    message: message !== undefined ? message : i18n.global.messages[i18n.global.locale].error
  })
}
