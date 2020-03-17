<template>
  <div class="userComments">
      <p>{{this.$attrs.name}}</p>
      <p>{{this.$attrs.email}}</p>
      <p>{{this.$attrs.comment}}</p>
      <p>{{this.$attrs.time}}</p>
  </div>
</template>
<style scoped>
  .userComments {
    background: #f5cd79;
    margin: 10px 0;
    border: chocolate 7px outset;
    border-radius: 25px;
    text-align: center;
  }
</style>

<script>
    export default {

    }
</script>