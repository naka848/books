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
      const querry = "/1";
      const result = await axios.get(
        "http://127.0.0.1:8000/api/books" + querry
      );
      console.log(result);
    //   return false;
    };

    // getData();

    return { data, getData };
  },
};
</script>

