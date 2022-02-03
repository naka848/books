<template>
  <div>
    {{book_list}}
    <!-- 「{{ book_list.title }}」
    {{ book_list.author }} 著 -->
    <button @click="deleteAction">削除する</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "DeleteBookC",
  props:{
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      book_information_id: props.book_list.book_information_id,
    });

    const deleteAction = async () => {
      // 削除処理
      await axios.delete("http://127.0.0.1:8000/api/book_information/" + data.book_information_id);
      // 書籍情報一覧へ（Listコンポーネント）
      window.location.href = "http://127.0.0.1:8000/list";
    };
    return { data, deleteAction };
  },
};
</script>