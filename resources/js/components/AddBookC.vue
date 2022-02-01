<template>
  <div>
    「{{ book_list.title }}」 {{ book_list.author }} 著
    <button @click="addAction">追加する</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "AddBookC",
  props: {
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      book_information_id: props.book_list.book_information_id,
      purchase_date: '2022-02-22',
    });

    const addAction = async () => {
      console.log(data.book_information_id);
      // 書籍追加処理
      await axios.post("http://127.0.0.1:8000/api/books", {
        book_information_id: data.book_information_id,
        purchase_date: data.purchase_date,
      });
      // 書籍情報一覧へ（Listコンポーネント）
      // window.location.href = "http://127.0.0.1:8000/list";
    };
    return { data, addAction };
  },
};
</script>