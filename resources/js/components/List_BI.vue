<template>
  <div>
    <h3>書籍情報一覧</h3>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default{
  name: "List_BI",
  setup() {
    const data = reactive({
      book_information: [],
    });
    const url = "http://127.0.0.1:8000/api/book_information";
    const getAPI = async () => {
      const result = await axios.get(url);
      console.log(result);
      data.book_information = result.data;
    };

    getAPI();

    return { getAPI };
    },
};
</script>
