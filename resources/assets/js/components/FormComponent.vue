<template>
  <div >
    <div class="mt-5 mb-5 grid  grid-cols-1 lg:grid-cols-7 gap-4">
      <div class="md:col-span-3 relative border border-gray-300 rounded-md px-3 py-2 shadow-sm  focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label for="name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Name</label>
        <input v-model="form_name" type="text" name="name" id="name" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500  sm:text-sm" placeholder="Jane Doe">
      </div>

      <div class="md:col-span-3 relative border border-gray-300 rounded-md px-3 py-2 shadow-sm focus-within:ring-1 focus-within:ring-indigo-600 focus-within:border-indigo-600">
        <label for="name" class="absolute -top-2 left-2 -mt-px inline-block px-1 bg-white text-xs font-medium text-gray-900">Comment</label>
        <input v-model="form_comment" type="text" name="name" id="comment" class="block w-full border-0 p-0 text-gray-900 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="A great comment...">
      </div>

      <button
          :disabled="store.state.loading"
          v-on:click="postComment()"
          type="button"
          class="md:col-span-1 flex justify-evenly pt-2 px-3 py-1.5 border border-transparent text-xs font-medium rounded-full shadow-sm text-white "
          v-bind:class="{ 'bg-indigo-300': store.state.loading, 'bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500': !store.state.loading }"
      >
        <svg v-if="store.state.loading" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
        </svg>

        {{ parent_id ? 'Reply' : 'Post' }}

      </button>
    </div>

    <error-display-component v-bind:errors="errors" />

  </div>
</template>

<script>
    import { store } from "../store";

    export default {
      props:[
          'parent_id'
      ],
      data: function() {
        return {
          form_name: '',
          form_comment: '',
          errors: {},
          store,
        }
      },
      methods: {
        postComment: function(){

          const payload = {
            name: this.form_name,
            comment: this.form_comment
          }

          if(this.parent_id){
            payload.parent_id = this.parent_id
          }

          const successCallback = () => {
            this.resetForm()
          }

          const errorCallback = (error) => {
            this.setErrors(error.response.data.errors)
          }

          store.postComment(payload, successCallback, errorCallback)

        },
        resetForm: function(){
          this.form_name = ''
          this.form_comment = ''
          this.setErrors({})
        },
        setErrors(errors){
          this.errors = errors
        },
      }
    }
</script>
