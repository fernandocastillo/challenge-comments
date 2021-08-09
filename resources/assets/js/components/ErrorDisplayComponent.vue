<template>
  <div class="mb-5">
    <p class="mt-2 text-sm text-red-600" id="email-error" v-for="(val, key) in errors">{{val[0]}}</p>
  </div>
</template>

<script>
    export default {
      props: ['errors'],
    }
</script>
