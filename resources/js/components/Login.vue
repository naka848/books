<template>
  <div>
    <h3>ログイン</h3>
    <dl>
      <dt>メール</dt>
      <dd><input type="email" v-model="data.form.email" /></dd>
      <dt>パスワード</dt>
      <dd><input type="password" v-model="data.form.password" /></dd>
    </dl>
    <button @click="loginAction">ログイン</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "CreateInfo",
  setup() {
    const data = reactive({
      form: {
        email: "",
        password: "",
      },
    });

    const loginAction = async () => {
      await axios.get("/sanctum/csrf-cookie").then(response => {
        // ログインデータを送る！…どこに？
      });
    };

    return { data, loginAction };
  },
};
</script>