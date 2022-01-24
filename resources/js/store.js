import { createStore } from 'vuex';

export const store = createStore({
    state(){
        return{
            book_list:[],
            // available_book_id: [],
        }
    },
    mutations: {
        update: (state,obj)=> {
            // 配列の初期化
            state.book_list = []
            // データの受け取り
            state.book_list.push(obj.bookList)

            // state.available_book_id = []
            // state.available_book_id.push(obj.id)

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
    // }
})

export default store