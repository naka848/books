<template>
  <div>
    「{{ book_list.title }}」 {{ book_list.author }} 著 出版 :
    {{ book_list.publisher }} ({{ book_list.published }}) 
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