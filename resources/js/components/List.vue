<template>
  <div>
    {{ book_list }}
  </div>
</template>

<script>
import { reactive } from "vue";
export default {
  name: "List",
  props:{
    book_list: Object,
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