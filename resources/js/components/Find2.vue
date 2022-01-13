<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>
    <!-- <FindC
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
// import FindC from "./FindC";

export default {
  name: "Find2",
  // components: {
  //   FindC,
  // },
  setup() {
    const data = reactive({
      find: '',
      // book_list: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );
      console.log(result);
      // data.book_list = result.data;
      // console.log("http://127.0.0.1:8000/api/book_information" + querry)
      // console.log(data.book_list);
    };

    return { data, getData };
  },
};
</script>

