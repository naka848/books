<template>
  <div>
    <h3>貸出状況</h3>
    <StatusC
      v-for="book in data.book_info"
      v-bind:book_list="book"
      v-bind:key="book.book_information_id"
    />
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
import StatusC from "./StatusC";

export default {
  name: "Status",
  components: {
    StatusC,
  },
  setup() {
    const data = reactive({
      book_info: [],
    });

    const getData = async () => {

      //indexアクションへ
      const result = await axios.get(
        "http://127.0.0.1:8000/api/rentals"
      );
      data.book_info = result.data;
    };

    getData();

    return { data, getData };
  },
};
</script>