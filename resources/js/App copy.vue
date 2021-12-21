<template>
<div>
  <HelloWorld 
    v-for="data in data.bookData"
    v-bind:book_data="data"
    v-bind:key="data.id" />
  <router-view></router-view>
</div>
</template>

<script>
// 関数reactiveのインポート
import { reactive } from "vue";
// "axios"のライブラリのインポート
import axios from "axios";

import HelloWorld from "./components/HelloWorld";

export default {
  name: "App",
  components: {
    HelloWorld,
  },
  setup() {
    const data = reactive({
      message: "Hello Vue!!!!!!!!",
      bookData:[],
    });
    const url = "http://127.0.0.1:8000/api/books";
    const getAPI = async () => {
      // 指定アドレスにアクセスしてデータを受け取る（p400）
      const result = await axios.get(url);
      data.bookData = result.data;
      console.log(result);
      console.log(data.bookData);
      console.log(data.bookData[0]);
    };

    getAPI();

    return {
      data,
      getAPI,
    };
  },
};
</script>