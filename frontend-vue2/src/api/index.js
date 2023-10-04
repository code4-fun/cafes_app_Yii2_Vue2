import axios from 'axios'

export const API_URI = 'https://cafe-api.ru/api/test/site'
export const BASE_URI = 'http://backend-yii2/web/api'

export const api = uri => axios.create({
  baseURL: uri
})
