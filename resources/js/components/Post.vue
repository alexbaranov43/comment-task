<template>
  <div>
    <h3>Topic of Discussion</h3>
    <img class="post-image" src="https://media.buzzle.com/media/images-en/gallery/quotes/funny/1200-500252366-your-life.jpg" alt="">
    <br><br>
    <button class="btn btn-secondary show-button" @click="showCommentBox()">Leave a comment.</button>
    <br><br>
    <comment-form-component v-bind:attr="this.$attrs"></comment-form-component>
    <br><br>
    <div>
     <!-- v-for="comment in comments" :key="comment.created_at" -->
     <!-- > -->
      <!-- <comment-list-component></comment-list-component> -->
    </div>
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
        data() {
          return {
            comments: {},
          }
        },
        methods: {
          showCommentBox() {
            $('.commentBox').css('display', 'block');
            $('.show-button').css('display', 'none');
          },
          getComments(){
            axios.get('/comments')
              .then((response)=>{
                this.comments = response.data.comments
              })
          }
        },
        created() {
            this.getComments()
        }
    }
</script>