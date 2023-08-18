import Vue from 'vue'
import Vuex from 'vuex'
import {cafeModule} from './modules/cafeModule'

Vue.use(Vuex)
export default new Vuex.Store({
  modules: {
    cafes: cafeModule
  }
})
