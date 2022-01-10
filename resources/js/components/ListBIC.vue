<template>
  <div>
    「{{ book_list.title }}」
    {{ book_list.author }} 著
    出版 : {{ book_list.publisher }} ({{ book_list.published }})

    <!-- テスト用。あとでけす！！ -->
    {{ book_list.book_id }}
  </div>
</template>

<script>
// import { reactive } from "vue";
export default {
  name: "ListBIC",
  props:{
    book_list: Object,
  },
  // setup() {
  //   // ここ消してもいいのでは？
  //   const data = reactive({
  //     title: "Vueeeee",
  //   });
  //   return {
  //     data,
  //   };
  // },
};
</script>