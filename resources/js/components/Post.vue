<template>
  <div>
    <h3>Topic of Discussion</h3>
    <img class="post-image" src="https://media.buzzle.com/media/images-en/gallery/quotes/funny/1200-500252366-your-life.jpg" alt="">
    <br><br>
    <button class="btn btn-secondary" @click="showCommentBox()">Leave a comment.</button>
    <br><br>
    <comment-form-component class="commentBox" v-bind:attr="this.$attrs"></comment-form-component>
  </div>
</template>

<style scoped>
  .post-image {
    /* height: 100px; */
    width: 60%;
  }

  .commentBox {
    display:none;
  }
</style>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
          showCommentBox() {
            $('.commentBox').css('display', 'block');
          }
        }
    }
</script>