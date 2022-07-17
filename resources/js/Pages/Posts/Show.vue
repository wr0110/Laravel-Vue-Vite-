<template>

  <Head :title="post.title" />

  <div class="flex flex-wrap py-6">
    <h1 class="text-3xl font-bold hover:text-gray-700 pb-4">{{ post.title }}</h1>
    <p>{{ post.content }}</p>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'

defineProps({ post: Object })
</script>