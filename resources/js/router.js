import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import ListP from "./components/ListP";
import Find from "./components/Find";
import Find2 from "./components/Find2";
import Find3 from "./components/Find3";
// import ListBI from "./components/ListBI";
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
            path: '/find2',
            name: 'find2',
            component: Find2,
        },
        {
            path: '/find3',
            name: 'find3',
            component: Find3,
        },
        // {
        //     path: '/listBI',
        //     name: 'listBI',
        //     component: ListBI,
        // },
        {
            path: '/create',
            name: 'create',
            component: Create,
        }
    ]
})

export default router