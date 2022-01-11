<template>
  <div>
    「{{ book_list.title }}」
    {{ book_list.author }} 著
    出版 : {{ book_list.publisher }} ({{ book_list.published }})
  </div>
</template>

<script>
export default {
  name: "FindC",
  props:{
    book_list: Object,
  },
};
</script>