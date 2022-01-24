import { createStore } from 'vuex';
import createPersistedState from 'vuex-persistedstate'

export const store = createStore({
    state() {
        return {
            book_list: [],
        }
    },

    mutations: {
        update: (state, obj) => {
            // 配列の初期化
            state.book_list = []
            // データの受け取り
            state.book_list.push(obj.bookList)

            console.log('store.state.book_list');
            console.log(store.state.book_list);

        },

        // actionの利用
        // count: (state,n)=>{
        //     state.counter += n
        // },
        // say: (state,msg)=>{
        //     state.message = msg
        // },
    },
    // actions:{
    //     doit:(context)=>{
    //         var n = 7
    //         context.commit('count',n)
    //         context.commit('say','add'+n)
    //     },
    // },
    plugins: [
        createPersistedState(),
    ],
})

export default store

// console.log('store.state.book_list');
// console.log(store.state.book_list);