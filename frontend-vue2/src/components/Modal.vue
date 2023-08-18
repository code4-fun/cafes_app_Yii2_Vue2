<template>
  <div v-if="this.showModal" @click="setShowModal(false)" class="modal">
    <div @click.stop class="modal_content">
      <slot></slot>
    </div>
  </div>
</template>

<script>
import {mapGetters, mapMutations} from 'vuex'

export default {
  methods: {
    ...mapMutations(['setShowModal'])
  },
  computed: {
    ...mapGetters(['showModal'])
  }
}
</script>

<style scoped>
.modal {
  top: 0;
  bottom: 0;
  right: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.5);
  position: fixed;
  display: flex;
}
.modal_content {
  margin: auto;
  background: white;
  border-radius: 5px;
  min-width: 500px;
  padding: 18px;
  max-height: 100vh;
  overflow-y: auto;
}
</style>
