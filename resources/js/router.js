import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import ListP from "./components/ListP";
import Find from "./components/Find";
import ListBI from "./components/ListBI";
import Create from "./components/Create";

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
        {
            path: '/find',
            name: 'find',
            component: Find,
        },
        {
            path: '/listBI',
            name: 'listBI',
            component: ListBI,
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
        }
    ]
})

export default router