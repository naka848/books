<template>
  <div>
    <h3>ログイン</h3>
    <dl>
      <dt>メール</dt>
      <dd><input type="email" v-model="data.email" /></dd>
      <dt>パスワード</dt>
      <dd><input type="password" v-model="data.password" /></dd>
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
      email: "nakao@example.com",
      password: "nakao",
    });

    const loginAction = async () => {
      // これはよさそう
      await axios.get("/sanctum/csrf-cookie");
      // ここがうまく動いていない
      try {
        await axios.post("/login", {
          email: data.email,
          password: data.password,
        });
      } catch (e) {
        console.log(e);
      }

      // これもなんかちがうな・・・
      // await axios.get("/sanctum/csrf-cookie").then((response) => {
      //   axios.post("/login", {
      //     email: data.email,
      //     password: data.password,
      //   });
      //   console.log(response);
      // });

    };

    return { data, loginAction };
  },
};
</script>