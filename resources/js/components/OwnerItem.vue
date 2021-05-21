<template>
  <div class="div-table-row">
    <div class="div-table-col">{{product.id}}</div>
    <div class="div-table-col">{{product.title}}</div>
    <div class="div-table-col">{{product.category.title}}</div>
    <div class="div-table-col">{{product.price}}</div>
    <div class="div-table-col">
      <a :href="'/product/edit/' + product.id" class="btn btn-warning">Edit</a>
      <a :href="'/product/delete/' + product.id" class="btn btn-danger">Delete</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "OwnerItem",
  props: ['product'],

}
</script>
