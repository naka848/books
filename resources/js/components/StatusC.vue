<template>
  <div>
    {{ book_list }}
    <!-- 「{{ book_list.title }}」 {{ book_list.author }} 著 出版 :
    {{ book_list.publisher }} ({{ book_list.published }}) 貸出状態 :
    {{ book_list.availability }} -->
    <!-- <button
      v-if="book_list.availability"
      @click="
        $store.commit({ type: 'update', bookList: book_list });
        transit();
      "
    >
      借りる
    </button> -->
  </div>
</template>

<script>
export default {
  name: "StatusC",
  props: {
    book_list: Object,
  },
  setup() {
    // Borrowコンポーネントへ
    // const transit = () => {
    //   window.location.href = "http://127.0.0.1:8000/borrow";
    // };
    // return { transit };
  },
};
</script>