<template>
  <h1 class="font-bold text-gray-800 uppercase hover:text-gray-700 text-3xl py-5">Featured artitles</h1>

  <ul class="divide-y divide-gray-100 w-full">
    <li class="p-3 text-gray-500 hover:bg-gray-100 hover:text-black flex flex-col" v-for="item in items">
      <a :href="`/posts/${item.slug}`" class="text-xl font-bold hover:text-gray-700 pb-2">{{ item.title }}</a>
      <p href="#" class="text-sm pb-2">
        By <a href="#" class="font-semibold hover:text-gray-800">{{ item.author.name }}</a>,
        {{ item.published_at_in_time_ago }} ago
      </p>
    </li>
  </ul>
</template>

<script setup>
defineProps({ items: [Object] })
</script>