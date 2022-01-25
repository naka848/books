<template>
  <div>
    <h3>書籍返却</h3>
  </div>
</template>

<script>
import { onMounted, reactive } from "vue";
import axios from "axios";

export default {
  name: "Return",
  setup() {
    const data = reactive({
      rental_id: 3,
      current_date: "2022-01-01",
    });
    const returnData = async () => {
      console.log(data.rental_id);
      console.log(data.current_date);
      // rentalsテーブルのreturn_dateに返却ボタンが押された日の日付を入力
      await axios.patch("http://127.0.0.1:8000/api/rentals/" + data.rental_id, {
        return_date: data.current_date,
      });
      window.location.href = "http://127.0.0.1:8000/status";
    };
    onMounted(() => {
      returnData();
    });
    return { data, returnData };
  },
};
</script>