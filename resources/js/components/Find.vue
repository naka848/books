<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>

    <!-- {{ data.books[0] }} -->
    <br />
    <!-- 配列の中にキーが入ってて指定できない -->
    {{ data.books.book_information_id }}

    <!-- <FindC
      v-for="book in data.books"
      v-bind:book_list="book"
      v-bind:key="data.books.book_information_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "Find",
  setup() {
    const data = reactive({
      find: "vue",
      books: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );

      // 子コンポーネントに送るデータの初期化
      data.books = [];

      // 要素のコピーを渡している
      result.data.map((item) => {
        // 書籍ごとの情報をまとめる配列の定義
        const book_list = item[0];

        // console.log(book_list);

        // 貸出可能な本の冊数を記録する配列の定義／初期化
        const availability_ary = [];

        // book_idごとに貸出可能な状態か調べ、
        // 貸出可能であれば記録用の配列に「1」を追加する
        book_list.books.forEach(element => {
            if(element.availability === 1){
                // push()は参照を扱うので、元の配列も変化する
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