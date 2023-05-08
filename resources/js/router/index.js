import Home from "../components/Home.vue";
import Register from "../components/Register.vue";
import Login from "../components/Login.vue";
import Dashboard from "../components/Dashboard.vue";
import Posts from '../components/Posts.vue';
import AddPosts from '../components/addPost.vue';
import Tarifa from "../components/Tarifa.vue";
import Pago from "../components/Pago.vue";
import Entrenamiento from "../components/Entrenamiento.vue";
import Musculo from "../components/Musculo.vue";
import crearUsuarios from "../components/crearUsuarios.vue";
import eliminarUsuarios from "../components/eliminarUsuarios.vue";
import updateUsers from "../components/updateUsers.vue";
import roleAdmin from "../components/rolesAdmin.vue";
import updateRoles from "../components/updatRoles.vue";
import Compania from "../components/Compania.vue";
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
    {
        name: "tarifa",
        path: "/tarifa",
        component: Tarifa,
    },
    {
        name: "pago",
        path: "/pago/:idtarifa",
        component: Pago,
    },
    {
        name: "entrenamiento",
        path: "/entrenamiento",
        component: Entrenamiento,
    },
    {
        name: "musculo",
        path: "/musculo",
        component: Musculo,
    },
    {
        name: "crearUsuarios",
        path: "/crearUsuarios",
        component: crearUsuarios,
    },
    {
        name: "eliminarUsuarios",
        path: "/eliminarUsuarios",
        component: eliminarUsuarios,
    },
    {
        name: "updateUsers",
        path: "/updateUsers/:id",
        component: updateUsers,
    },
    {
        name: "roleAdmin",
        path: "/roleAdmin",
        component: roleAdmin,
    },
    {
        name: "updateRoles",
        path: "/updateRoles",
        component: updateRoles,
    },
    {
        name: "compania",
        path: "/compania",
        component: Compania,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
