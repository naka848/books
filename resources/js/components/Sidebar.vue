<template>
    <div>
        <p>【メニュー】</p>
        <p>学生用</p>
        <ul>
            <li><router-link to="/list">本の一覧</router-link></li>
            <li><router-link to="/find">本を探す</router-link></li>
        </ul>
        <p>教員用</p>
        <ul>
            <li><router-link to="/create">本の追加</router-link></li>
            <li>本の削除</li>
        </ul>
    </div>
</template>

<script>
export default {
    name: "Sidebar",
    setup() {
        
    },
}
</script>
