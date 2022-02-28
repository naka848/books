<template>
  <div>
    <h3>ログアウト</h3>
    <p>ログアウトしてもよろしいですか？</p>
    <button @click="logoutAction">OK</button>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Logout",
  setup() {
    const logoutAction = async () => {
      const result = await axios.get("/api/logout");
      console.log(result);
      // ログイン画面へ
      window.location.href = "http://127.0.0.1:8000/";
    };
    return { logoutAction };
  },
};
</script>

