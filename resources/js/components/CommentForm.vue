<template>
  <div>
    <!-- Flash Message Upon Success -->
    <flash message=""></flash>
    <div class="commentBox">
      <!-- Comment Form for Submission -->
      <form @submit.prevent="submit" method="POST">
          <div class="form-group">
              <label for="comment">Comment</label>
              <!-- Hidden User ID Input -->
              <input type="hidden" class="form-control" id="user_id" name="user_id" rows="5" v-model="fields.user_id">
              <!-- Comment Text Input -->
              <textarea class="form-control" id="comment" name="comment" rows="5" v-model="fields.comment" required></textarea>
              <div v-if="errors && errors.comment" class="text-danger">{{ errors.comment[0] }}</div>
          </div>
          <button type="submit" class="btn btn-primary">Post Comment</button>
      </form>
      <br>
      <button class="btn btn-danger cancel-button" @click='cancel()'>Cancel</button>
    </div>
    <br><br>
    <!-- Div to create each individual comment box -->
    <div class v-for="comment in comments" :key="comment.created_at">
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
      showDismissibleAlert: false
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
          // hide and show logic upon success
          $('form').hide()
          $('.cancel-button').hide()
          $('.show-button').removeAttr('disabled')
          this.getComments()
          // Flash message success
          flash('Comment Successfully Added.', 'success');
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            // flash message failure
            flash('Incorrect User Id or Comment Value', 'failure')
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
    cancel() {
      this.fields = {}; //Clear input fields.
      $('form').hide();
      $('.cancel-button').hide();
      $('.show-button').removeAttr('disabled')
    },
    getComments(){
      axios.get('/comments')
            .then((response)=>{
            this.comments = response.data.comments
            })
            this.thirtySecondRefresh();
      },
    // get comments every 30 seconds
    thirtySecondRefresh() {
      setTimeout(() => {
        this.getComments()
        console.log("This will load the last 5 comments every 30 seconds, if you don't believe me check the network tab :)")
      }, 30000);
    }
  },
  created() {
      this.getComments()
    }
  }
</script>