<template>
<div>
  <Header />
  <Sidebar />
  <!-- <List
    v-for="data in data.book_list"
    v-bind:book_list="data"
    v-bind:key="data.book_id" /> -->
  <router-view></router-view>
</div>
</template>

<script>
import Header from "./components/Header";
import Sidebar from "./components/Sidebar";
import List2 from "./components/List2";

import { reactive } from "vue";
import axios from "axios";

export default {
  name: "App",
  components: {
    Header,
    Sidebar,
    List,
  },
  setup() {
    const data = reactive({
      book_list:[],
    });
    const url = "http://127.0.0.1:8000/api/books";
    const getAPI = async () => {
      const result = await axios.get(url);
      console.log(result);
      data.book_list = result.data
    };

    getAPI();

    return {
      data,
      getAPI,
    };
  },
};
</script>