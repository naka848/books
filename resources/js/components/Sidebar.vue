<template>
    <div>
        <p>メニュー（SAMPLE）</p>
        <router-link to="/list">本の一覧</router-link>
        <br>
        <router-link to="/find">本を探す</router-link>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
    setup() {
        
    },
}
</script>
