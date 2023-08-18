<template>
  <div>
    <div class="cafe_list_item" v-for="cafe in cafes" :key="cafe.id" @click="setShowModal({
      showModal: true,
      currentCafeId: cafe.id
    })">
      <div class="cafe_list_item_title">{{ cafe.name }}</div>
      <div v-if="cafe.address">{{ cafe.address }}</div>
    </div>
  </div>
</template>

<script>
import {mapActions, mapGetters, mapMutations} from 'vuex'

export default {
  methods: {
    ...mapActions(['fetchCafes', 'fetchCafe']),
    ...mapMutations(['setShowModal'])
  },
  computed: {
    ...mapGetters(['cafes'])
  },
  created() {
    this.fetchCafes()
  }
}
</script>
<style scoped>
</style>
