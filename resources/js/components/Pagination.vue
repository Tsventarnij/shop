<template>
  <nav aria-label="...">
    <ul class="pagination justify-content-center" >
        <li v-for="link in links" :class="'page-item' + (link.active ? ' active' : '')">
          <span v-if="link.active" class="page-link">{{link.label}}</span>
          <button v-else class="page-link" v-on:click="loadData(link.url)" v-html="link.label"></button>
        </li>
    </ul>
  </nav>
</template>

<script>
export default {
  name: "Pagination",
  props: ['links', 'loadData']
}
</script>

<style scoped>

</style>