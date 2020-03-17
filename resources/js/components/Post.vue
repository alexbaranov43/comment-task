<template>
  <div>
    <h3>Topic of Discussion</h3>
    <img class="post-image" src="https://cdn.i-scmp.com/sites/default/files/styles/768x768/public/d8/images/methode/2019/03/14/5cacc3ac-4547-11e9-b5dc-9921d5eb8a6d_image_hires_110410.jpg?itok=9a_yNxcN&v=1552532658" alt="Pineapple Pizza">
    <br><br>
    <button style="width:100%" class="btn btn-primary show-button" @click="showCommentBox()">Leave a comment.</button>
    <br><br>
    <comment-form-component v-bind:attr="this.$attrs"></comment-form-component>
    <br><br>
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
            // console.log('Component mounted.')
        },
        data() {
          return {
            comments: {},
          }
        },
        methods: {
          showCommentBox() {
            $('.commentBox').css('display', 'block');
            $('form').show();
            $('.cancel-button').show();
            $('.show-button').attr('disabled', 'true');
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