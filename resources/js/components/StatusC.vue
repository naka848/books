<template>
  <div>
    <!-- {{book_list[0]}}
    {{book_list[1]}} -->
    <br>
    <br>
    「{{ book_list[1].title }}」 {{ book_list[1].author }} 著 
    <button @click="transit">返す</button>
  </div>
</template>

<script>
export default {
  name: "StatusC",
  props: {
    book_list: Object,
  },
  setup() {
    // Returnコンポーネントへ
    const transit = () => {
      window.location.href = "http://127.0.0.1:8000/return";
    };
    return { transit };
  },
};
</script>