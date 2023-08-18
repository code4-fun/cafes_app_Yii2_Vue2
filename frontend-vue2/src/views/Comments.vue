<template>
  <div class="comments">
    <form @submit.prevent="submitHandler">
      <textarea name="comment"></textarea>
      <button class="material-symbols-outlined">send</button>
    </form>
    <div class="comments_block">
      <div class="comment_item" v-for="comment of comments" :key="comment.id">{{ comment.text }}</div>
    </div>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  methods: {
    ...mapActions(['fetchComments', 'saveComment']),
    submitHandler(e){
      const form = e.target
      this.saveComment({
        text: form.comment.value,
        id_cafe: this.currentCafeId
      })
      form.comment.value = ''
    }
  },
  computed: {
    ...mapGetters(['currentCafeId', 'comments'])
  },
  created() {
    this.fetchComments()
  }
}
</script>
<style scoped>
</style>
