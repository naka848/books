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
            const result = await axios.post("/api/logout");
            console.log(result);
        };
        return { logoutAction };
    },
}
</script>

