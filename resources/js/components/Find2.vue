<template>
  <div>
    <h3>書籍検索</h3>
    <input type="text" v-model="data.find" />
    <button @click="getData">検索</button>

    {{ data.book_list }}

    <!-- <Find2C
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    /> -->
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
      books: [],
    });

    const getData = async () => {
      const querry = "/" + data.find;
      const result = await axios.get(
        "http://127.0.0.1:8000/api/book_information" + querry
      );

      console.log(result.data);

      // result.data.map((book_lists) => {
      //   book_lists.map((book_list) => {
      //     console.log(book_list);
      //     data.book_list = book_list;
      //   });
      // });

      // result.data.map((item) => {

      for (let item in result.data) {
        // console.log(item);

        let book_list= [];

        const book_info = result.data[item][0];

        book_list.author = book_info.author;
        book_list.published = book_info.published;
        book_list.publisher = book_info.publisher;
        book_list.title = book_info.title;
        book_list.books = book_info.books

        const availability_ary = [];
        if(availability_ary.length > 0){
          book_list.availability = true;
        }else{
          book_list.availability = false;
        }
        console.log('book_list')
        console.log( book_list.books)
        book_list.books.forEach(element => {
          console.log(element.availability);
          if(element.availability === 1){
            console.log('true')
            availability_ary.push(1)
          }
        });
        
        console.log(availability_ary);
        console.log(availability_ary.length);
        // console.log(book_list);
        data.books.push(book_list);

      }

      console.log(data.books);

    };

    return { data, getData };
  },
};
</script>

