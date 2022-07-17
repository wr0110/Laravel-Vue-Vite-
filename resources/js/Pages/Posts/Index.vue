<template>

  <Head title="Blog" />

  <div class="flex flex-wrap py-6">
    <section class="w-full md:w-2/3 px-3">
      <PostList :items="posts.data" />

      <Pagination :pageUrl="$page.url" :current="posts.meta.current_page" :total="posts.meta.total" :perPage="posts.meta.per_page"
        :only="['posts']" @page-changed="changePage" />
    </section>

    <aside class="w-full md:w-1/3 px-3">
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