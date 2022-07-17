<template>

  <Head :title="post.title" />

  <div class="flex sm:justify-center py-6">
    <article class="w-full md:w-2/3 px-3">
      <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ post.title }}</h1>
      <p>{{ post.content }}</p>
    </article>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

defineProps({ post: Object })
</script>