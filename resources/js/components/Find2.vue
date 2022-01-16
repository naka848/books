<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>


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
      book: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );

      // data.book_lists = result.data;
      // data.book_lists.map((book_list) => {
      //   console.log(book_list);

      // [[]]に入った配列を取り出す
      result.data.map((book_lists) => {
        // console.log(book_lists);

      //   // []に入った配列を取り出す
        book_lists.map((book_list) => {
          // console.log(book_list);

      //     // 分割代入
      //     // bookの中身から、book_information_idとそれ以外（another）をそれぞれ取り出す
          const { book_information_id, ...another } = book_list;
          // console.log(book_information_id);
          // console.log(another);

          // element:配列内の現在の要素
          // index:配列内の現在の要素の番号
          // self:メソッドを実行する関数
          data.book = book_list.filter((element, index, self) => 
            // findIndex()…配列内の指定されたテスト関数を満たす最初の要素の位置を返す
            self.findIndex(e => 
              e.book_information_id === element.book_information_id
            ) === index
          );

          console.log(data.book);






        });

      });
      // console.log(...data.book_lists);


    };

    return { data, getData };
  },
};
</script>

