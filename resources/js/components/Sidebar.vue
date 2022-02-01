<template>
    <div>
        <h4>【メニュー】</h4>
        <h4>学生用</h4>
        <ul>
            <li><router-link to="/list">本の一覧</router-link></li>
            <li><router-link to="/find">本を探す</router-link></li>
            <!-- <li><router-link to="/find2">本を探す(2)</router-link></li> -->
            <!-- <li><router-link to="/borrow">本を借りる</router-link></li> -->
            <li><router-link to="/status">貸出状況</router-link></li>
            <!-- <li><router-link to="/test">Test</router-link></li> -->
        </ul>
        <h4>教員用</h4>
        <h5>書籍情報</h5>
        <ul>
            <li><router-link to="/createInfo">登録</router-link></li>
            <li><router-link to="/deleteInfo">削除</router-link></li>
        </ul>
        <h5>書籍</h5>
        <ul>
            <li><router-link to="/addBook">登録</router-link></li>
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
