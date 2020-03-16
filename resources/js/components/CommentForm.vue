<template>
    <form @submit.prevent="submit" method="POST">
        <div class="form-group">
            <label for="comment">Comment</label>
            <!-- <textarea type="hidden" class="form-control" id="email" name="email" rows="5" v-model="fields.email"></textarea> -->
            <input type="hidden" class="form-control" id="user_id" name="user_id" rows="5" value="1" v-model="fields.user_id">
            <textarea class="form-control" id="comment" name="comment" rows="5" v-model="fields.comment" required></textarea>
            <div v-if="errors && errors.comment" class="text-danger">{{ errors.comment[0] }}</div>
        </div>
        <button class="btn btn-danger" @click='cancel()'>Cancel</button>
        <button type="submit" class="btn btn-primary">Post Comment</button>
    </form>
</template>

<script>
export default {
  data() {
    return {
      fields: {},
      errors: {},
      success: false,
      loaded: true,
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
        }).catch(error => {
          this.loaded = true;
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      }
    },
    cancel() {
      $('form').hide()
    }
  },
}
</script>