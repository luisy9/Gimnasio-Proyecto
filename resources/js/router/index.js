import Home from "../components/Home.vue";
import Register from "../components/Register.vue";
import Login from "../components/Login.vue";
import Dashboard from "../components/Dashboard.vue";
import Posts from '../components/Posts.vue';
import AddPosts from '../components/addPost.vue';
// import EditPosts from '../components/editPosts.vue';
import {createWebHistory, createRouter} from "vue-router";

export const routes = [
    {
        name: "home",
        path: "/",
        component: Home,
    },
    {
        name: "register",
        path: "/register",
        component: Register,
    },
    {
        name: "login",
        path: "/login",
        component: Login,
    },
    {
        name: "dashboard",
        path: "/dashboard",
        component: Dashboard,
    },
    {
        name: "posts",
        path: "/posts",
        component: Posts,
    },

    {
        name: "addposts",
        path: "/addposts",
        component: AddPosts,
    },
    // {
    //     name: "editposts",
    //     path: "/editposts",
    //     component: EditPosts,
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
