import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import List from "./components/List";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        {
            path: '/list',
            // nameの情報はルーティングには使わないので、特に気を遣わずに命名してよし
            name: 'list',
            component: List,
        },
        // {
        //     path: '/hello',
        //     name: 'index',
        //     component: HelloWorld,
        // }
    ]
})

export default router