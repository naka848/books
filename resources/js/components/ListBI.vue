<template>
  <div>
    <h3>書籍情報一覧</h3>
    <ListBIC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

import ListBIC from "./ListBIC";

export default{
  name: "ListBI",
  components: {
    ListBIC,
  },
  setup() {
    const data = reactive({
      book_list: [],
    });
    const url = "http://127.0.0.1:8000/api/book_information";
    const getAPI = async () => {
      const result = await axios.get(url);
      console.log(result);
      data.book_list = result.data;
    };

    getAPI();

    return {
      data,
      getAPI,
    };
  },
};
</script>
