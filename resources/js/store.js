import { createStore } from 'vuex';
import axios from "axios";
import createPersistedState from 'vuex-persistedstate'

export const store = createStore({
    state() {
        return {
            book_list: [],
            book_info_list: [],
        }
    },

    mutations: {
        // book_listに検索された本の一覧を保管する
        update: (state, obj) => {
            // 配列の初期化
            state.book_list = []
            // データの受け取り
            state.book_list.push(obj.bookList)
            // console.log('store.state.book_list');
            // console.log(store.state.book_list);
        },
        // book_info_listに書籍情報一覧を保管する
        // 本の一覧／書籍情報の削除にて使用
        call: (state,obj) => {
            state.book_info_list = obj.concat();
            console.log('mutations');
            console.log(store.state.book_info_list);
            console.log(store.state.book_info_list[0].title);
        },
    },
    actions:{
        // async関数はpromise（非同期処理の結果）を返す
        getBookList: async (context)=>{
            const url = "http://127.0.0.1:8000/api/book_information";
            const result = await axios.get(url);
            console.log('actions');
            console.log(result.data);
            context.commit('call',result.data);
            return store.state.book_info_list;
        }
    },
    plugins: [
        createPersistedState(),
    ],
})

export default store

// console.log('store.state.book_list');
// console.log(store.state.book_list);