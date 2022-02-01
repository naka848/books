<template>
  <div>
    <h3>書籍追加登録</h3>
    <AddBookC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import { useStore } from "vuex";
// import axios from "axios";
import AddBookC from "./AddBookC";

export default {
  name: "AddBook",
    components: {
    AddBookC,
  },
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