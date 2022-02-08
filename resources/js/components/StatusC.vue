<template>
  <div>
    「{{ book_list[2].title }}」 {{ book_list[2].author }} 著
    <button @click="returnAction">返す</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";
import dayjs from "dayjs";

export default {
  name: "StatusC",
  props: {
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      rental_id: props.book_list[0],
      book_id: props.book_list[1],
      current_date: "",
    });

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
      await axios.patch("http://127.0.0.1:8000/api/books/" + data.book_id, {
        component: 'StatusC',
      });

      window.location.href = "http://127.0.0.1:8000/status";
    };
    return { data, returnAction };
  },
};
</script>