<template>
  <div>
    <h3>書籍情報一覧</h3>
    {{ data.book_list }}
    <!-- <ListC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
import { useStore } from "vuex";
// import ListC from "./ListC";

export default {
  name: "ListP",
  components: {
    // ListC,
  },
  setup() {
    const data = reactive({
      book_list: [],
    });
    const store = useStore();

    // これはPromise（非同期処理の結果）
    store.dispatch("getBookList");

    // awaitをつけるとPromiseが普通のオブジェクトに変わる
    // awaitはPromiseが解決するまで待つ
    // awaitは一番上では使えない（トップレベルawait）
    // await store.dispatch("getBookList");

    // なのでasyncをつける！
    const getBookList = async () => {
      const result = await store.dispatch("getBookList");
      console.log(result)
      data.book_list = result;
      console.log("ListPコンポーネント");
      console.log(data.book_list);
    };
    
    getBookList();

    // (async () => {
    //   await store.dispatch("getBookList");
    //   console.log('即自関数')
    // })
   
    // console.log('result');
    // console.log(result);

    return {
      data,
      getBookList,
    };
  },
};
</script>