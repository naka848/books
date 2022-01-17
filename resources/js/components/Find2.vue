<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "Find2",
  setup() {
    const data = reactive({
      find: "vue",
      book: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );

      console.log(result.data);


    };

    return { data, getData };
  },
};
</script>

