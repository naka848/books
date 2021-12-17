import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
// import HelloWorld from './components/HelloWorld'

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        // {
        //     path: '/',
        //     name: 'index',
        //     component: HelloWorld,
        // },
        // {
        //     path: '/hello',
        //     name: 'index',
        //     component: HelloWorld,
        // }
    ]
})

export default router