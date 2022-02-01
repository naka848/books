<template>
  <div>
    <h3>本を借りる</h3>
    「{{ $store.state.book_list[0].title }}」
    {{ $store.state.book_list[0].author }} 著 出版 :
    {{ $store.state.book_list[0].publisher }} ({{
      $store.state.book_list[0].published
    }}) 貸出状態 :
    {{ $store.state.book_list[0].availability }}
    <br />
    <dl>
      <dt>ユーザーID</dt>
      <dd>
        <input type="text" v-model="data.user_id" />
      </dd>
      <dt>貸出日</dt>
      <dd>
        <input type="date" v-model="data.checkout_date" />
      </dd>
    </dl>
    <button @click="borrow_event">借りる</button>
  </div>
</template>

<script>
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";
import dayjs from "dayjs";
import axios from "axios";

export default {
  name: "Borrow",
  setup() {
    const data = reactive({
      user_id: "",
      checkout_date: "",
    });

    const store = useStore();

    // 貸出日にデフォルトで今日の日付を表示
    onMounted(() => {
      const now = dayjs();
      data.checkout_date = now.format("YYYY-MM-DD");
    });

    const borrow_event = async () => {
      const target_book_id = store.state.book_list[0].available_book_id[0];

      // rentalsテーブルに貸出データを追加
      await axios.post("http://127.0.0.1:8000/api/rentals", {
        user_id: data.user_id,
        book_id: target_book_id,
        checkout_date: data.checkout_date,
      });

      // booksテーブルの、貸出されたbook_idのavailabilityをfalseに変更
      await axios.patch("http://127.0.0.1:8000/api/books/" + target_book_id);
      // 貸出状況のページへ（statusコンポーネントへ）
      window.location.href = "http://127.0.0.1:8000/status";
    };
    return { data, borrow_event };
  },
};
</script>
