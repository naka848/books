<template>
  <div>
    <h3>本を借りる</h3>
    <p>「Vue.js3 超入門」</p>
    <p>+その他書籍情報</p>
    <button @click="borrow_event">借りる</button>
    <br>
    <br>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "Borrow",
  props: {
    // Numberでいいのか？String…？
    book_id: Number,
  },
  setup() {
    const borrow_event = async () => {
      const result = await axios.post("http://127.0.0.1:8000/api/rentals", {
        user_id: 6,
        book_id: 1,
        checkout_date: "2022-01-19",
      });
      console.log(result);
    };
    return { borrow_event };
  },
};
</script>
