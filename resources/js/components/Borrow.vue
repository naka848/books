<template>
  <div>
    <h3>本を借りる</h3>
    <p>～書籍情報を表示したい！～</p>

    book_list : {{ $store.state.book_list }}
    <br />
    <br />

    <dl>
      <dt>ユーザーID</dt>
      <dd>
        <!-- ここの初期値も反映されないな… -->
        <input type="text" v-model="data.user_id" value='32' />
      </dd>
      <dt>貸出日</dt>
      <dd>
        <input
          type="date"
          v-model="data.checkout_date"
          name="today"
          id="today"
        />
      </dd>
    </dl>

    <button @click="borrow_event">借りる</button>

    <!-- {{ data.user_id }}
    {{ data.checkout_date }} -->
  </div>
</template>

<script>
import { onMounted, reactive } from "vue";
import axios from "axios";

export default {
  name: "Borrow",
  props: {
    // Numberでいいのか？String…？
    book_id: Number,
  },
  setup() {
    const data = reactive({
      user_id: "",
      checkout_date: "",
    });
    onMounted(() => {
      const today = new Date();
      today.setDate(today.getDate());
      const yyyy = today.getFullYear();
      const mm = ("0" + (today.getMonth() + 1)).slice(-2);
      const dd = ("0" + today.getDate()).slice(-2);
      document.getElementById("today").value = yyyy + "-" + mm + "-" + dd;
    });

    // console.log(data.user_id);
    // console.log(data.checkout_date);

    const borrow_event = async () => {
      const result = await axios.post("http://127.0.0.1:8000/api/rentals", {
        user_id: data.user_id,
        book_id: 1,
        checkout_date: data.checkout_date,
      });
      console.log(result);

      // 両方入力すれば入る
      console.log(data.user_id);
      // デフォルトで設定した今日の日付が入らない
      console.log(data.checkout_date);
    };
    return { data, onMounted, borrow_event };
  },
};
</script>
