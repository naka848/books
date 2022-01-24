import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import ListP from "./components/ListP";
import Find from "./components/Find";
import Find2 from "./components/Find2";
import Borrow from "./components/Borrow";
import Return from "./components/Return";
import Create from "./components/Create";
import Test from "./components/Test";

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
            path: '/borrow',
            name: 'borrow',
            component: Borrow,
        },
        {
            path: '/return',
            name: 'return',
            component: Return,
        },
        {
            path: '/create',
            name: 'create',
            component: Create,
        },
        {
            path: '/test',
            name: 'test',
            component: Test,
        },
    ]
})

export default router


