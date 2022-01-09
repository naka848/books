<template>
    <div>
        <h3>書籍情報の登録</h3>
        <div>
            <label>タイトル　</label>
            <input type="text" v-model="data.title">
        </div>
        <div>
            <label>著者名　　</label>
            <input type="text" v-model="data.author">
        </div>
        <div>
            <label>出版社名　</label>
            <input type="text" v-model="data.publisher">
        </div>
        <div>
            <label>出版日　　</label>
            <input type="date" v-model="data.published">
        </div>
        <button @click="getData">登録</button>
    </div>
</template>

<script>
import { reactive } from "vue";

export default{
    name: "Create",
    setup() {
        const data = reactive({
            title: "",
            author: "",
            publisher: "",
            published: "",
        });

    const getData = () => {
        console.log(data.title);
    };

    return { data, getData };
        
    },
}
</script>

