<template>
  <div>
    <h3>書籍情報一覧</h3>
    <ListC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import { useStore } from "vuex";
import ListC from "./ListC";

export default {
  name: "ListP",
  components: {
    ListC,
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
      console.log(result)
      data.book_list = result;
    };
    
    getBookList();

    return {
      data,
      getBookList,
    };
  },
};
</script>