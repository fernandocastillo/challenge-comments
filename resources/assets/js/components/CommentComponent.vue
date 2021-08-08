<template>
  <div>
  <ul class="divide-y divide-gray-200 bg-">
    <li v-for="comment in comments" :key="comment.id" class="relative bg-white py-5 px-1 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
      <div class="flex justify-between space-x-3">
        <div class="min-w-0 flex-1">
          <a href="#" class="block focus:outline-none">
            <span class="absolute inset-0" aria-hidden="true" />
            <p class="text-sm font-medium text-gray-900 truncate">{{ comment.name }}</p>
          </a>
        </div>
        <time class="flex-shrink-0 whitespace-nowrap text-sm text-gray-500">{{ since(comment.created_at) }}</time>
      </div>
      <div class="mt-1">
        <p class="line-clamp-2 text-sm text-gray-600">
          {{ comment.comment }}
        </p>
      </div>
    </li>
  </ul>

  </div>
</template>

<script>

export default {


  mounted: function(){
    axios
        .get('comment')
        .then(response => {
          this.paginator = response.data;
          this.comments = response.data.data;
        })
  },
  data: function() {
    return {
      paginator: {},
      comments: []
    }
  },

  methods: {
    since: function(date){
      return moment(date).fromNow()
    }
  }
}
</script>