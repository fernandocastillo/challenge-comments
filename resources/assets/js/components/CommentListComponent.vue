<template>
  <div>

    <form-component></form-component>



    <ul class="divide-y divide-gray-200 bg-">
      <individual-comment-component
          v-for="comment in shared.comments"
          :key="comment.id"
          v-bind:comment="comment"
      ></individual-comment-component>
    </ul>

    <pagination :data="shared.paginator" @pagination-change-page="store.getResults"></pagination>

  </div>
</template>

<script>
import { store } from "../store.js";

export default {
  mounted: function(){
    axios
        .get('comment')
        .then(response => {
          store.setPaginator(response)
        })
  },
  data: function() {
    return {
      shared: store.state,
      store,
    }
  },

  methods: {
  }
}
</script>