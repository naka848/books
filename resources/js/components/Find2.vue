<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>

    <!-- これ表示されないのなんでだろう？ -->
    {{ data.books }}
    <br>
    {{ data }}

  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "Find2",

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

      // console.log("result.data");
      // console.log(result.data);

      // 要素のコピーを渡している
      result.data.map((item) => {
        // 書籍ごとの情報をまとめる配列の定義／初期化
        const book_list = [];

        const book_info = item[0];

        // エラー対策(エラー原因未解決)
        // book_list.push(item[0]);

        console.log(book_list);

        // 参照渡しはうまくいく
        // data.books = book_info;
        // console.log(data.books);
        // 子コンポーネントに送りたい情報をbook_listに追加
        book_list.author = book_info.author;

        // 参照渡しはうまくいく
        // data.books = book_list.author;
        // console.log(data.books);

        // これはうまくいかない！！
        // data.books.push(book_list);
        // console.log(data.books);

        book_list.published = book_info.published;
        book_list.publisher = book_info.publisher;
        book_list.title = book_info.title;
        book_list.books = book_info.books;

        // この時点でうまくいってない
        // console.log(book_list);
        // data.books = book_list;
        

        // 貸出可能な本の冊数を記録する配列の定義／初期化
        const availability_ary = [];

        // book_idごとに貸出可能な状態か調べ、
        // 貸出可能であれば記録用の配列に「1」を追加する
        book_list.books.forEach(element => {
          // console.log(element);
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
        // console.log(data.books);
      });

      // console.log("data.books"); 
      // console.log(data.books);

      console.log("result.data");
      console.log(result.data);

    };

    return { data, getData };
  },
};
</script>

