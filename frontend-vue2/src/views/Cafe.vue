<template>
  <div class="cafe">
    <div class="cafe_title cafe_info">
      {{ cafe.name }}
    </div>
    <div v-if="cafe.address" class="cafe_info">
      <span>Адрес:</span> {{ cafe.address }}
    </div>
    <div v-if="cafe.landmark" class="cafe_info">
      <span>Как найти:</span> {{ cafe.landmark }}
    </div>
    <div v-if="cafe.cuisine" class="cafe_info">
      <span>Кухня:</span> {{ cafe.cuisine }}
    </div>
    <div v-if="cafe.distance" class="cafe_info">
      <span>Расстояние:</span> {{ cafe.distance }} м
    </div>
    <div v-if="cafe.time" class="cafe_info">
      <span>Время:</span> {{ cafe.time }} мин.
    </div>
    <div class="cafe_info">
      <span>Бизнес-ланч:</span> {{ cafe.business_lunch ? 'есть' : 'нет' }}
    </div>
    <div v-if="cafe.price" class="cafe_info">
      <span>Средний чек:</span> {{ cafe.price }} р
    </div>
    <div v-if="cafe.photo" class="cafe_info">
      <img :src="cafe.photo" alt="img">
    </div>
    <div v-if="!showComments" @click="showComments = !showComments" class="show_comments">Показать комментарии</div>
    <div v-else @click="showComments = !showComments" class="hide_comments">Скрыть комментарии</div>
    <comments v-if="showComments"></comments>
  </div>
</template>

<script>
import Comments from './Comments'
import {mapGetters, mapActions, mapMutations} from 'vuex'

export default {
  data(){
    return{
      showComments: false
    }
  },
  components: {
    Comments
  },
  methods: {
    ...mapActions(['fetchCafe']),
    ...mapMutations(['removeComments'])
  },
  computed: {
    ...mapGetters(['cafe'])
  },
  created() {
    this.fetchCafe()
  },
  destroyed() {
    this.removeComments()
  }
}
</script>
<style scoped>
</style>
