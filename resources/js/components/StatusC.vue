<template>
  <div>
    「{{ book_list[1].title }}」 {{ book_list[1].author }} 著
    <button @click="returnAction">返す</button>
  </div>
</template>

<script>
import { reactive } from "vue";
import axios from "axios";

export default {
  name: "StatusC",
  props: {
    book_list: Object,
  },
  setup(props) {
    const data = reactive({
      rental_id: props.book_list[0],
      current_date: "2022-01-23",
    });

    // 返却処理
    // 返却する本のrental_idの返却日に今日の日付を入力する
    const returnAction = async () => {
      console.log(data.rental_id);
      console.log(data.current_date);
      // rentalsテーブルのreturn_dateに返却ボタンが押された日の日付を入力
      await axios.patch("http://127.0.0.1:8000/api/rentals/" + data.rental_id, {
        return_date: data.current_date,
      });
      window.location.href = "http://127.0.0.1:8000/status";
    };
    return { data, returnAction };
  },
};
</script>