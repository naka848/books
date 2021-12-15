<template>
  <div>
    {{ data.title }}
  </div>
</template>

<script>
import { reactive } from "vue";
export default {
  name: "HelloWorld",
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