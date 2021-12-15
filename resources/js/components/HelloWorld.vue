<template>
  <div>
    <!-- {{ data.title }} -->
    {{ book_data.title }}
    {{ book_data.price }}
  </div>
</template>

<script>
import { reactive } from "vue";
export default {
  name: "HelloWorld",
  props:{
    book_data: Object,
  },
  setup() {
    const data = reactive({
      title: "Vueeeee",
    });
    return {
      data,
    };
  },
};
</script>