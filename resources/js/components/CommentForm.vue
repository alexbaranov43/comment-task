<template>
  <div>
    <form class="commentBox" @submit.prevent="submit" method="POST">
        <div class="form-group">
            <label for="comment">Comment</label>
            <input type="hidden" class="form-control" id="user_id" name="user_id" rows="5" value="1" v-model="fields.user_id">
            <textarea class="form-control" id="comment" name="comment" rows="5" v-model="fields.comment" required></textarea>
            <div v-if="errors && errors.comment" class="text-danger">{{ errors.comment[0] }}</div>
        </div>
        <button class="btn btn-danger" @click='cancel()'>Cancel</button>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
    <div v-for="comment in comments" :key="comment.created_at">
      <comment-list-component v-bind:name="comment.name" v-bind:email="comment.email" v-bind:comment="comment.comment" v-bind:time="comment.created_at"></comment-list-component>
    </div>
  </div>
</template>

<style scoped>
  .commentBox {
    display:none;
  }
</style>
<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
      comments: {},
    }
  },
  methods: {
    submit() {
      if (this.loaded) {
        //set the user id to the passed attribute
        this.fields.user_id = this.$attrs.attr.name.id
        this.loaded = false;
        this.success = false;
        this.errors = {};
        axios.post('comment/post', this.fields).then(response => {
          this.fields = {}; //Clear input fields.
          this.loaded = true;
          this.success = true;
          $('form').hide()
          $('.show-button').css('display', 'block')
          this.$emit('comment applied')
          this.getComments()
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
    cancel() {
      $('form').hide();
      $('.show-button').css('display', 'block');
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