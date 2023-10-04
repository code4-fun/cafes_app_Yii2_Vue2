<template>
  <div class="comments">
    <form @submit.prevent="submitHandler">
      <textarea name="comment"></textarea>
      <button class="material-symbols-outlined">send</button>
    </form>
    <div v-if="error" class="error_message">{{ error }}</div>
    <div class="comments_block">
      <div class="comment_item" v-for="comment of comments" :key="comment.id">{{ comment.text }}</div>
    </div>
  </div>
</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
  data(){
    return {
      error: ''
    }
  },
  methods: {
    ...mapActions(['fetchComments', 'saveComment']),
    submitHandler(e){
      const form = e.target
      if(!form.comment.value){
        this.error = 'put some comment here'
        return
      }
      this.saveComment({
        text: form.comment.value,
        id_cafe: this.currentCafeId
      })
      form.comment.value = ''
      this.error = ''
    }
  },
  computed: {
    ...mapGetters(['currentCafeId', 'comments'])
  },
  created() {
    this.fetchComments()
  },
  destroyed() {
    this.error = ''
  }
}
</script>
<style scoped>
</style>
