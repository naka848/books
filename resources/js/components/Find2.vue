<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>
    <Find2C
      v-for="data in data.book_lists"
      v-bind:book_lists="data"
      v-bind:key="data.book_id"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
import Find2C from "./Find2C";

export default {
  name: "Find2",
  components: {
    Find2C,
  },
  setup() {
    const data = reactive({
      find: '',
      book_lists: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );
      // console.log(result);
      data.book_lists = result.data;
      // console.log(data.book_lists);
    };

    return { data, getData };
  },
};
</script>

