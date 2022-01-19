<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>

    <!-- これ表示されないのなんでだろう？ -->
    {{ data.books }}
    <br>
    {{ data.test }}

    

    <!-- <FindC
      v-for="data in data.books"
      v-bind:book_list="data"
      キー確認！！
      v-bind:key="data.book_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
// import FindC from "./FindC";

export default {
  name: "Find",
  // components: {
  //   FindC,
  // },
  setup() {
    const data = reactive({
      find: "vue",
      books: [],
      test: "test",
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );

      // 子コンポーネントに送るデータの初期化
      data.books = []

      // console.log(result.data);

      result.data.map((item) => {
        // 書籍ごとの情報をまとめる配列の定義／初期化
        let book_list = [];

        const book_info = item[0];

        // 子コンポーネントに送りたい情報をbook_listに追加
        book_list.author = book_info.author;
        book_list.published = book_info.published;
        book_list.publisher = book_info.publisher;
        book_list.title = book_info.title;
        book_list.books = book_info.books;

        // 貸出可能な本の冊数を記録する配列の定義／初期化
        const availability_ary = [];

        // book_idごとに貸出可能な状態か調べ、
        // 貸出可能であれば記録用の配列に「1」を追加する
        book_list.books.forEach(element => {
          // console.log(element);
          if(element.availability === 1){
            availability_ary.push(1)
          }
        });

        // book_information_idごとに貸出可能な状態か調べる
        if (availability_ary.length === 0) {
          book_list.availability = false;
        } else {
          book_list.availability = true;
        }

        // console.log(availability_ary);
        // console.log(availability_ary.length);

        // 書籍ごとの情報をまとめた配列を、子コンポーネントに渡す配列に追加
        data.books.push(book_list);

      });

      console.log("data.books"); 
      console.log(data.books);

    };

    return { data, getData };
  },
};
</script>

