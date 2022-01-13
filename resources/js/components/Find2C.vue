<template>
  <div>
    <!-- {{ book_lists }} -->
    {{ data.book_list }}
  </div>
</template>

<script>
import { reactive } from "vue";
import Find2G from "./Find2G";

export default {
  name: "Find2C",
  components: {
    Find2G,
  },
  props:{
    book_lists: Object,
  },
  setup() {
    const data = reactive({
      book_list: [],
    });
    // data.book_list = book_lists;
    console.log(data.book_list);
    return { data };
  },
};
</script>