<template>
  <div>
    <h3>新規会員登録</h3>
    <dl>
      <dt>名前</dt>
      <dd><input type="text" v-model="data.name" /></dd>
      <dt>メール</dt>
      <dd><input type="email" v-model="data.email" /></dd>
      <dt>パスワード</dt>
      <dd><input type="password" v-model="data.password" /></dd>
    </dl>
    <button @click="getData">登録</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "CreateUser",
  setup() {
    const data = reactive({
      name: "",
      email: "",
      password: "",
    });

    // ユーザー情報を追加
    // →UserControllerのstoreアクション
    const getData = async () => {
      const result = await axios.post("http://127.0.0.1:8000/api/users", {
        name: data.name,
        email: data.email,
        password: data.password,
      });
      console.log(result);

      //登録が完了したら書籍情報一覧ページへとぶ
      // window.location.href = "http://127.0.0.1:8000/list";
    };

    return { data, getData };
  },
};
</script>