<template>
  <div v-if="load" style="text-align: center; padding: 100px">
    <div id="loading"></div>
  </div>
  <div v-else>
    <div class="div-table">
      <div class="div-table-row">
        <div class="div-table-col" v-for="label in ['#', 'Title', 'Category', 'Price', 'Action']">{{label}}</div>
      </div>
      <owner-item v-for="product in products" :product="product" :key="product.id"></owner-item>
    </div>
    <pagination :links="paginationLinks" :loadData="loadData"></pagination>
  </div>
</template>

<script>
import Pagination from "./Pagination";
import OwnerItem from "./OwnerItem";
export default {
  name: "OwnerList",
  components: {OwnerItem, Pagination},
  data: () => ({
    products: null,
    paginationLinks: null,
    load: false,
  }),

  methods: {
    loadData: function (url) {
      this.load = true;
      axios.get(url ? url : '/api/my_products')
          .then(response => (
              this.products = response.data.data,
              this.load = false,
              this.paginationLinks = response.data.links
          ));
    },
  },

  created() {
    this.loadData();
    },
}
</script>

<style scoped>
#loading {
  display: inline-block;
  width: 150px;
  height: 150px;
  border: 3px solid rgba(255,255,255,.3);
  border-radius: 50%;
  border-top-color: #050;
  animation: spin 1s ease-in-out infinite;
  -webkit-animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}
@-webkit-keyframes spin {
  to { -webkit-transform: rotate(360deg); }
}

.div-table {
  display: table;
  width: 100%;
  border-spacing: 5px;
}
/deep/ .div-table-row {
  display: table-row;
  width: auto;
  clear: both;
}
/deep/ .div-table-col {
  display: table-cell;

}
</style>
