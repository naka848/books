<template>
<div class="wrap">
  <Header class="header"/>
  <Sidebar class="sidebar"/>
  <router-view class="router-view"></router-view>
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

<style>
.wrap{
  width: 900px;
}

.header{
  background-color:darkslateblue;
  color: aliceblue;
  width: 900px;
  height: 70px;
  padding: 10px;
}

.sidebar{
  width: 150px;
  float: left;
  padding: 10px;
}

.router-view{
  background-color: rgb(227, 228, 230);
  width: 700px;
  height: 800px;
  float: right;
  padding: 10px;
}

dl dt {
  width: 100px;
  padding: 10px 0;
  float: left;
  clear: both;
}

dl dd {
  padding: 10px 0;
}

</style>