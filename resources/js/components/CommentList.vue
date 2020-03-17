<template>
  <div class="card userComments">
      <p>{{this.$attrs.name}} Says:</p>
      <p>{{this.$attrs.comment}}</p>
      <p>Disagree? <br> Message them at: {{this.$attrs.email}}</p>
      <!-- <p>{{this.$attrs.time}}</p> -->
  </div>
</template>
<style scoped>
  .userComments {
    /* background: #f5cd79; */
    margin: 10px 0;
    /* border: gray 5px outset; */
    /* border-radius: 25px; */
    text-align: center;
  }
</style>

<script>
    export default {

    }
</script>