<template>
  <ListItem v-for="item in items" :item="item" />
</template>

<script setup>
import ListItem from './ListItem.vue'

defineProps({ items: [Object] })
</script>