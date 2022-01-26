<template>
  <div>
    <h3>書籍情報登録</h3>
    <dl>
      <dt>タイトル</dt>
      <dd><input type="text" v-model="data.title" /></dd>
      <dt>著者名</dt>
      <dd><input type="text" v-model="data.author" /></dd>
      <dt>出版社名</dt>
      <dd><input type="text" v-model="data.publisher" /></dd>
      <dt>出版日</dt>
      <dd><input type="date" v-model="data.published" /></dd>
    </dl>
    <button @click="getData">登録</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "CreateInfo",
  setup() {
    const data = reactive({
      title: "",
      author: "",
      publisher: "",
      published: "",
    });

    // 書籍情報を追加
    // →BookInformationControllerのstoreアクション
    const getData = async () => {
      const result = await axios.post(
        "http://127.0.0.1:8000/api/book_information",
        {
          title: data.title,
          author: data.author,
          publisher: data.publisher,
          published: data.published,
        }
      );
      console.log(result);

      //登録が完了したら書籍情報一覧ページへとぶ
      window.location.href = "http://127.0.0.1:8000/list";
    };

    return { data, getData };
  },
};
</script>