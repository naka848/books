<template>
  <div>
    「{{ book_list[1].title }}」 {{ book_list[1].author }} 著
    <button @click="returnAction">返す</button>
    {{book_list}}
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
import dayjs from "dayjs";
import { useStore } from "vuex";

export default {
  name: "StatusC",
  props: {
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      rental_id: props.book_list[0],
      current_date: "",
    });

    const store = useStore();

    // 返却処理
    const returnAction = async () => {
      const now = dayjs();
      // 返却日に今日の日付を入力する
      data.current_date = now.format("YYYY-MM-DD");
      // rentalsテーブルのreturn_dateに返却ボタンが押された日の日付を入力
      await axios.patch("http://127.0.0.1:8000/api/rentals/" + data.rental_id, {
        return_date: data.current_date,
      });
      // booksテーブルのavailabilityをtrue「1」に戻す
      const target_book_id = store.state.book_list[0].available_book_id[0];
      await axios.patch("http://127.0.0.1:8000/api/books/" + target_book_id, {
        component: 'StatusC',
      });

      console.log('target_book_id');
      console.log(target_book_id);

      console.log('store.state.book_list');
      console.log(store.state.book_list);

      // window.location.href = "http://127.0.0.1:8000/status";
    };
    return { data, returnAction };
  },
};
</script>