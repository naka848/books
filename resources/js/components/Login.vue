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
      await axios.get("/sanctum/csrf-cookie");
      try {
        const result = await axios.post("/api/login", {
          email: data.email,
          password: data.password,
        });
        console.log(result);
      } catch (e) {
        console.log(e);
      }
    };

    return { data, loginAction };
  },
};
</script>