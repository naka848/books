<template>
  <div>
    {{ book_list }}
    <!-- 「{{ book_list.title }}」
    {{ book_list.author }} 著
    出版 : {{ book_list.publisher }} ({{ book_list.published }}) -->
  </div>
</template>

<script>
export default {
  name: "Find2C",
  props:{
    book_list: Object,
  },
};
</script>