<template>
    <div>
        <h3>書籍検索</h3>
        <input type="text"  v-model="data.find">
        <button @click="getData">検索</button>
    </div>
</template>

<script>
// import { reactive } from "vue";
// import axios from "axios";

// let url = "http://127.0.0.1:8000/find"

export default{
    name: "Find",
    // setup() {
    //     const data = reactive({
    //         find: '',
    //     });    
    // },
    // まずはＬＩＳＴにアクセスできるか確認
    // const getData = ()=> {
    //     axios.get("http://127.0.0.1:8000/list");

    // },
}
</script>

