<template>
  <ListItem v-for="item in items" :item="item" />
</template>

<script>
import ListItem from './ListItem.vue'

export default {
  components: { ListItem },
  props: {
    items: [Object],
  }
}
</script>