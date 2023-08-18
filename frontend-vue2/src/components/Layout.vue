<template>
  <div class="wrapper">
    <header class="header">
      <div class="header_container container">
        <div class="header_left">
          <router-link to='/cafes'>Cafes</router-link>
          <router-link to='/about'>About</router-link>
        </div>
        <div class="header_right">
          <div class="random_link" @click="randomCafe">Random cafe</div>
        </div>
      </div>
    </header>

    <main class="page">
      <div class="main_container container">
        <router-view/>
      </div>
    </main>

    <footer class="footer">
      <div class="container">
        &copy; Cafes app 2023
      </div>
    </footer>
    <modal>
      <cafe />
    </modal>
  </div>
</template>

<script>
import Modal from './Modal'
import Cafe from '../views/Cafe'
import {mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  components: {
    Modal,
    Cafe
  },
  methods: {
    ...mapActions([]),
    ...mapMutations(['setShowModal']),
    randomCafe(){
      const ids = []
      this.cafes.forEach(item => ids.push(item.id))
      const randId = ids[Math.floor(Math.random() * ids.length)]
      this.setShowModal({
        showModal: true,
        currentCafeId: randId
      })
    }
  },
  computed: {
    ...mapGetters(['cafes'])
  }
}
</script>
<style scoped>
</style>
