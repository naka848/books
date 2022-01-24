<template>
    <div>
        <h1>テストページ</h1>
        <p>{{ $store.state.message }}</p>
        <button @click="$store.commit('change')">値の変更</button>
        <button @click="$store.commit('plus','tuika')">引数渡し</button>
        <p>{{ $store.state.counter }}</p>
        <button @click="$store.commit({type:'plusObj',message:'add!',add:5})">オブジェクト渡し</button>
        <button @click="$store.dispatch('doit')">actionの利用</button>
    </div>
</template>

<script>
export default{
    name: "Test",
    setup() {
        
    },
}
</script>