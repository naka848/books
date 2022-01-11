<template>
  <div>
    <h3>書籍検索</h3>
      <input type="text" v-model="data.find" />
      <button @click="getData">検索</button>
  </div>
</template>

<script>
import { reactive } from "vue";
// import { reactive, onMounted } from "vue";
import axios from "axios";

// let url = "http://127.0.0.1:8000/api/books"

export default {
  name: "Find",
  setup() {
    const data = reactive({
      find: "",
    });

    const getData = async () => {
      const querry = "/Vue.js3 超入門";
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );
      console.log("http://127.0.0.1:8000/api/book_information" + querry)
      console.log(result);
    };

    return { data, getData };
  },
};
</script>

