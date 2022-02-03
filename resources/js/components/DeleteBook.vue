<template>
  <div>
    <h3>除籍する本の検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>
    <DeleteBookC
      v-for="data in data.books "
      v-bind:book_list="data"
      v-bind:key="data.book_information"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
import DeleteBookC from "./DeleteBookC";

export default {
  name: "DeleteBook",
  components: {
    DeleteBookC,
  },
  setup() {
    const data = reactive({
      // "vue"は後で""に直す
      find: "vue",
      // 送りたい情報がここにまとまる
      books: [],
    });

    // BookInformationController、showアクションへ
    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );
      data.books = result.data;

      // console.log(result);

    };
    return { data, getData };
  },
};
</script>