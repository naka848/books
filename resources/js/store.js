import { createStore } from 'vuex';

export const store = createStore({
    // storeで利用する値をまとめておく場所
    state(){
        return{
            message: 'This is store data.'
        }
    }
})

export default store