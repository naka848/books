<template>
  <div>
    <Find2G
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    />
    <!-- {{ data.book_list }} -->
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
  setup(props) {
    const data = reactive({
      book_list: [],
    });
    data.book_list = props.book_lists;
    return { data };
  },
};
</script>