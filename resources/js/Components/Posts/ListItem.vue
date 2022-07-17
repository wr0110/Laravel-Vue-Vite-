<template>
  <article class="flex flex-col shadow my-4">
    <div class="bg-white flex flex-col justify-start p-6">
      <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ item.category.name }}</a>
      <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ item.title }}</a>
      <p href="#" class="text-sm pb-3">
        By <a href="#" class="font-semibold hover:text-gray-800">{{ item.author.name }}</a>, {{ item.published_at_in_time_ago }} ago
      </p>
      <a href="#" class="pb-6">{{ item.content }}</a>
      <a href="#" class="uppercase text-gray-800 hover:text-black hover:font-bold">
        Continue Reading
      </a>
    </div>
  </article>
</template>

<script>
export default {
  props: {
    item: Object,
  },
}
</script>