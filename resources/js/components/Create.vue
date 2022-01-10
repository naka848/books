<template>
    <div>
        <h3>書籍情報登録</h3>
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
import axios from "axios";

export default{
    name: "Create",
    setup() {
        const data = reactive({
            title: "",
            author: "",
            publisher: "",
            published: "",
        });

    const getData = async () => {
      const result = await axios.post(
        "http://127.0.0.1:8000/api/book_information",
        {
            title: data.title,
            author: data.author,
            publisher: data.publisher,
            published: data.published,
        }
      );
      console.log(result);
    };

    return { data, getData };
        
    },
}
</script>

