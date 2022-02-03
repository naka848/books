<template>
  <div>
    <h3>貸出状況</h3>
    <dl>
      <dt>ユーザーID</dt>
      <dd><input type="text" v-model="data.user_id" /></dd>
    </dl>
    <button @click="getData">検索</button>

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
      // 後で消す！
      user_id: "1",
      book_info: [],
    });

    const getData = async () => {
      // console.log(data.user_id);

      const querry = "/" + data.user_id;
      //showアクションへ
      const result = await axios.get(
        "http://127.0.0.1:8000/api/rentals" + querry
      );
      data.book_info = result.data;
    };

    return { data, getData };
  },
};
</script>