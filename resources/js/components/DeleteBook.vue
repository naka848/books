<template>
  <div>
    <h3>除籍</h3>
    <!-- <DeleteInfoC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
import { useStore } from "vuex";
// import axios from "axios";
// import DeleteInfoC from "./DeleteInfoC";

export default {
  name: "DeleteBook",
  // components: {
  //   DeleteInfoC,
  // },
  setup() {
    const data = reactive({
      book_list: [],
    });
    const store = useStore();

    // Storeのactionへ
    // 書籍情報一覧データ取得
    const getBookList = async () => {
      const result = await store.dispatch("getBookList");
      data.book_list = result;
      // console.log(data.book_list);
    };

    getBookList();

    return {
      data,
      getBookList,
    };
  },
};
</script>