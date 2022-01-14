<template>
  <div>
    <Find2G
      v-for="data in data.book_list"
      v-bind:book_list="data"
      v-bind:key="data.book_id"
    />
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

    // data.book_list = props.book_lists;

    data.book_list = new Map(props.book_lists.map(o => [o.book_information_id,o]));
    // console.log(data.book_list);

    // 現在のコンポーネント内で分解
    // →データの加工と表示のコンポーネントを分けたいので使わない
    // props.book_lists.forEach(function(element){
    //   data.book_list = element;
    // });

    return { data };
  },
};
</script>