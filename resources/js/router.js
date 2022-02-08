import {createRouter, createWebHistory} from 'vue-router'
// 必要なコンポーネントをインポート
import Login from "./components/Login";
import Logout from "./components/Logout";
import CreateUser from "./components/CreateUser";
import ListP from "./components/ListP";
import Find from "./components/Find";
import Find2 from "./components/Find2";
import Borrow from "./components/Borrow";
import Status from "./components/Status";
import CreateInfo from "./components/CreateInfo";
import DeleteInfo from "./components/DeleteInfo";
import AddBook from "./components/AddBook";
import DeleteBook from "./components/DeleteBook";
// import Test from "./components/Test";

export const router = createRouter({
    history: createWebHistory(),
    routes: [
        // 必要な数だけ書く
        {
            path: '/',
            name: 'login',
            component: Login,
        },
        {
            path: '/logout',
            name: 'logout',
            component: Logout,
        },
        {
            path: '/createUser',
            name: 'createUser',
            component: CreateUser,
        },
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
            path: '/status',
            name: 'status',
            component: Status,
        },
        {
            path: '/createInfo',
            name: 'createInfo',
            component: CreateInfo,
        },
        {
            path: '/deleteInfo',
            name: 'deleteInfo',
            component: DeleteInfo,
        },
        {
            path: '/addBook',
            name: 'addBook',
            component: AddBook,
        },
        {
            path: '/deleteBook',
            name: 'deleteBook',
            component: DeleteBook,
        },
    ]
})

export default router


