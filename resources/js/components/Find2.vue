<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>
    <!-- <Find2C
      v-for="data in data.book_lists"
      v-bind:book_lists="data"
      v-bind:key="data.book_id"
    /> -->
    {{ data.book_information }}
    <br />
    <br />
    {{ data.book_information2 }}
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
// import Find2C from "./Find2C";

export default {
  name: "Find2",
  // components: {
  //   Find2C,
  // },
  setup() {
    const data = reactive({
      find: "vue",
      book_lists: [],
      book_information: [],
      book_information2: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );
      data.book_lists = result.data;
      // console.log(data.book_lists);
      data.book_lists.map((book_list) => {
        console.log(book_list);

        book_list.map((book) => {
          console.log(book);
          // 分割代入
          const { title, ...boo } = book;
          console.log(title);
          console.log(boo);
        });

        // data.book_information = {...book}

        // data.book_information = book_info
        // const book_info2 = [...book];
        // console.log(book_info2);
        // data.book_information2 = book_info2
      });
      // console.log(...data.book_lists);
    };

    return { data, getData };
  },
};
</script>

