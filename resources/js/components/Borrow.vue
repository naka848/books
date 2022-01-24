<template>
  <div>
    <h3>本を借りる</h3>

    <!-- book_list : {{ $store.state.book_list }} -->

    「{{ $store.state.book_list[0].title }}」
    {{ $store.state.book_list[0].author }} 著 出版 :
    {{ $store.state.book_list[0].publisher }} ({{
      $store.state.book_list[0].published
    }}) 貸出状態 :
    {{ $store.state.book_list[0].availability }}
    <br />
    <br />

    <dl>
      <dt>ユーザーID</dt>
      <dd>
        <input type="text" v-model="data.user_id" />
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

    {{ data.user_id }}
  </div>
</template>

<script>
import { onMounted, reactive } from "vue";
import { useStore } from "vuex";
import axios from "axios";

export default {
  name: "Borrow",
  setup() {
    const data = reactive({
      user_id: "1",
      checkout_date: "",
    });
    const store = useStore();

    onMounted(() => {
      const today = new Date();
      today.setDate(today.getDate());
      const yyyy = today.getFullYear();
      const mm = ("0" + (today.getMonth() + 1)).slice(-2);
      const dd = ("0" + today.getDate()).slice(-2);
      data.checkout_date = yyyy + "-" + mm + "-" + dd;
    });

    console.log(store.state.book_list);

    const borrow_event = async () => {
      const result = await axios.post("http://127.0.0.1:8000/api/rentals", {
        user_id: data.user_id,
        book_id: 1,
        checkout_date: data.checkout_date,
      });
      console.log("result");
      console.log(result.data);

      // console.log($store.state.book_list);
      // console.log($store.state.book_list[0].available_book_id);
    };
    return { data, onMounted, borrow_event };
  },
};
</script>
