<template>
  <div class="flex justify-center">
    <div class="flex items-center py-8">
      <Link :href="pageUrl" :only="only" :data="{ page: prevPage }" v-if="hasPrev()"
        class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center mr-3">
      Prev
      </Link>

      <Link :href="pageUrl" :only="only" :data="{ page: page }"
        :class="{ 'h-10 w-10 bg-blue-800 hover:bg-blue-600 font-semibold text-white text-sm flex items-center justify-center': current === page }"
        class="h-10 w-10 font-semibold text-gray-800 hover:bg-blue-600 hover:text-white text-sm flex items-center justify-center"
        v-for="page in pages">
      {{ page }}
      </Link>

      <Link :href="pageUrl" :only="only" :data="{ page: nextPage }" v-if="hasNext()"
        class="h-10 w-10 font-semibold text-gray-800 hover:text-gray-900 text-sm flex items-center justify-center ml-3">
      Next
      </Link>
    </div>
  </div>
</template>

<script>
import { Link } from '@inertiajs/inertia-vue3'

export default {
  components: {
    Link
  },
  props: {
    pageUrl: String,
    only: {
      type: [String],
      default: []
    },
    current: {
      type: Number,
      default: 1
    },
    total: {
      type: Number,
      default: 0
    },
    perPage: {
      type: Number,
      default: 10
    },
    pageRange: {
      type: Number,
      default: 5
    },
  },
  methods: {
    hasFirst() {
      return this.rangeStart !== 1
    },
    hasLast() {
      return this.rangeEnd < this.totalPages
    },
    hasPrev() {
      return this.current > 1
    },
    hasNext() {
      return this.current < this.totalPages
    },
  },
  computed: {
    pages() {
      const pages = []
      for (let i = this.rangeStart; i <= this.rangeEnd; i++) {
        pages.push(i)
      }
      return pages
    },
    rangeStart() {
      const start = this.current - this.pageRange
      return (start > 0) ? start : 1
    },
    rangeEnd() {
      const end = this.current + this.pageRange
      return (end < this.totalPages) ? end : this.totalPages
    },
    totalPages() {
      return Math.ceil(this.total / this.perPage)
    },
    nextPage() {
      return this.current + 1
    },
    prevPage() {
      return this.current - 1
    }
  }
}
</script>