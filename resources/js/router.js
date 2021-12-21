import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import ListP from "./components/ListP";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        {
            path: '/list',
            // nameの情報はルーティングには使わないので、特に気を遣わずに命名してよし
            name: 'list',
            component: ListP,
        },
        // {
        //     path: '/hello',
        //     name: 'index',
        //     component: HelloWorld,
        // }
    ]
})

export default router