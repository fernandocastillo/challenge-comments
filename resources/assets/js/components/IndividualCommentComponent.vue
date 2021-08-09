<template>
  <li class="relative  py-5 px-1 hover:bg-gray-50 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600">
    <div class="flex justify-between space-x-3">
      <div class="min-w-0 flex-1">
        <div class="block focus:outline-none">
          <p class="text-md font-medium text-gray-900 truncate">{{ comment.name }}</p>
        </div>
      </div>
      <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium  bg-indigo-100 text-indigo-800">
            {{ since(comment.created_at) }}
          </span>

    </div>
    <div class="mt-1">
      <p class="line-clamp-2 text-sm text-gray-600">
        {{ comment.comment }}
      </p>
    </div>

    <div
        v-on:click="show_nested = !show_nested"
        v-if="!comment.parent_id"
        class="mt-2 mb-2 font-medium text-indigo-700 text-sm cursor-pointer flex " >
      <div v-if="has_children" class="flex-shrink-0 w-2.5 h-2.5 rounded-full bg-indigo-600 mr-2 mt-1" aria-hidden="true"></div>
      {{ has_children ? children_label : reply_label }}
    </div>

    <div class="bg-gray-100 p-5 rounded-md" v-if="show_nested">

      <form-component
          v-bind:parent_id="comment.id"
      ></form-component>

      <ul class="divide-y divide-gray-200  " >
        <individual-comment-component
            v-for="nested_comment in comment.children"
            :key="nested_comment.id"
            v-bind:comment="nested_comment"
        ></individual-comment-component>
      </ul>

    </div>


  </li>
</template>

<script>
  import { store } from "../store.js";

    export default {
      props: [
          'comment',
      ],
      data: function() {
        return {
          show_nested: false,
          shared: store.state
        }
      },
      methods: {
        since: function(date){
          return moment(date).fromNow()
        },
      },
      computed: {
          has_children: function(){
            return  this.comment.children ? this.comment.children.length>0 : false
          },
          children_label: function(){
            return this.show_nested ?  'Hide all replies' : 'View all replies'
          },
          reply_label: function(){
            return this.show_nested ? 'Hide' : 'Add a reply'
          }
      }
    }
</script>
