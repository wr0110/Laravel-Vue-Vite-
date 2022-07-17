<template>

  <Head title="Blog" />

  <div class="flex flex-wrap py-6">
    <section class="w-full md:w-2/3 px-3">
      <PostList :items="posts.data" />

      <Pagination :pageUrl="$page.url" :current="posts.current_page" :total="posts.total" :perPage="posts.per_page"
        :only="['posts']" @page-changed="changePage" />
    </section>

    <aside class="w-full md:w-1/3 px-3">
      <h1 class="font-bold text-gray-800 uppercase hover:text-gray-700 text-4xl py-5">Featured artitles</h1>

      <FeaturedPostList :items="featured_posts" />
    </aside>
  </div>
</template>

<script setup>
import { Head } from '@inertiajs/inertia-vue3'
import PostList from '../../Components/posts/List.vue'
import FeaturedPostList from '../../Components/posts/FeaturedList.vue'
import Pagination from '../../Components/shared/Pagination.vue'

defineProps({
  posts: [Object],
  featured_posts: [Object]
})
</script>