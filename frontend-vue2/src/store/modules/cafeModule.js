import {api, API_URI, BASE_URI} from '../../api'

export const cafeModule = {
  state: () => ({
    cafes: [],
    showModal: false,
    currentCafeId: null,
    cafe: {},
    comments: []
  }),
  mutations: {
    setCafes: (state, payload) => {
      state.cafes = payload
    },
    setCafe: (state, payload) => {
      state.cafe = payload
    },
    setShowModal: (state, payload) => {
      state.showModal = payload.showModal
      state.currentCafeId = payload.currentCafeId
    },
    setComments: (state, payload) => {
      state.comments = payload
    },
    removeComments: (state) => {
      state.comments = []
    }
  },
  actions: {
    async fetchCafes({commit}){
      const response = await api(API_URI).get('/get-index')
      commit('setCafes', response.data.data)
    },
    async fetchCafe({commit, state}){
      const response = await api(API_URI).get('/get-view', {
        params: {
          id: state.currentCafeId
        }
      })
      commit('setCafe', response.data.data)
    },
    async fetchComments({commit, state}){
      const response = await api(BASE_URI).get(`/comments`, {
        params: {
          id: state.currentCafeId
        }
      })
      commit('setComments', response.data)
    },
    async saveComment({commit, state}, comment){
      const response = await api(BASE_URI).post(`/comments`, {
        text: comment.text,
        id_cafe: comment.id_cafe
      }, {
        headers: {
          "Content-Type": "application/json"
        }
      })
      commit('setComments', [...state.comments,
        {id: response.data.id, text: comment.text, id_cafe: comment.id_cafe} ]
        .sort((a, b) => b.id - a.id))
    },
  },
  getters: {
    cafes: state => state.cafes,
    cafe: state => state.cafe,
    showModal: state => state.showModal,
    currentCafeId: state => state.currentCafeId,
    comments: state => state.comments
  }
}
