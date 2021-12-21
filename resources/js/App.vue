<template>
<div>
  <Header />
  <Sidebar />
  <router-view></router-view>
</div>
</template>

<script>
import Header from "./components/Header";
import Sidebar from "./components/Sidebar";

export default {
  name: "App",
  components: {
    Header,
    Sidebar,
  },
};
</script>