<template>
  <div>
    「{{ book_list.title }}」 {{ book_list.author }} 著 出版 :
    {{ book_list.publisher }} ({{ book_list.published }}) 貸出状態 :
    {{ book_list.availability }}
    <button v-if="book_list.availability" @click="sendData">借りる</button>
    
    <!-- <Borrow
      v-bind:book_id="book_id"
    /> -->
  </div>
</template>

<script>
import { reactive } from "vue";
// import Borrow from "./Borrow";

export default {
  name: "FindC",
  // components: {
  //   Borrow,
  // },
  props: {
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      book_id: "",
    });
    const sendData = () => {
      data.book_id = props.book_list.available_book_id;
      console.log(data.book_id[0]);
    };
    return { data, sendData };
  },
};
</script>