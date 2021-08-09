<template>
  <div>
    <form-component></form-component>

    <ul class="divide-y divide-gray-200 bg-">
      <individual-comment-component
          v-for="comment in store.state.comments"
          :key="comment.id"
          v-bind:comment="comment"
      ></individual-comment-component>
    </ul>

    <pagination
        :data="store.state.paginator"
        @pagination-change-page="store.getResults"></pagination>

  </div>
</template>

<script>
import { store } from "../store.js";

export default {
  mounted: function(){
    store.getResults()
  },
  data: function() {
    return {
      store,
    }
  },
}
</script>