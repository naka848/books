<template>
    <div>
        <h4>【メニュー】</h4>
        <h4>学生用</h4>
        <ul>
            <li><router-link to="/list">本の一覧</router-link></li>
            <li><router-link to="/find">本を探す</router-link></li>
            <li><router-link to="/borrow">本を借りる(仮)</router-link></li>
        </ul>
        <h4>教員用</h4>
        <h5>書籍情報</h5>
        <ul>
            <li><router-link to="/create">登録</router-link></li>
            <li>削除</li>
        </ul>
        <h5>書籍</h5>
        <ul>
            <li>登録</li>
            <li>削除</li>
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
