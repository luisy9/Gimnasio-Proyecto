import Home from "../components/Home.vue";
import Register from "../components/Register.vue";
import Login from "../components/Login.vue";
import Dashboard from "../components/Dashboard.vue";
import Posts from "../components/Posts.vue";
import AddPosts from "../components/addPost.vue";
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
import CambiarTarifa from "../components/CambiarTarifa.vue";
import GestionarTarifas from "../components/GestionarTarifas.vue";
import CrearTarifas from "../components/crearTarifas.vue";
import updateTarifas from "../components/updateTarifas.vue";
import EjerciciosMusculo from "../components/EjerciciosMusculo.vue";
// import PechoMusculo from "../components/PechoMusculo.vue";
// import AbdominalesMusuculo from "../components/AbdominalesMusuculo.vue";
// import BicepsMusculo from "../components/BicepsMusculo.vue";
// import EspaldaMusculo from "../components/EspaldaMusculo.vue";
// import HombroMusculo from "../components/HombroMusculo.vue";
// import TricepsMusculo from "../components/BicepsMusculo.vue";
// import PiernaMusculo from "../components/PiernaMusculo.vue";
import { createWebHistory, createRouter } from "vue-router";

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
        path: "/dashboard/:idUser",
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
        path: "/pago/:idtarifa/:iduser",
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
    {
        name: "cambiarTarifa",
        path: "/cambiarTarifa/:idTarifa/:idUser",
        component: CambiarTarifa,
    },

    {
        name: "GestionarTarifas",
        path: "/GestionarTarifas",
        component: GestionarTarifas,
    },
    {
        name: "crearTarifas",
        path: "/crearTarifas",
        component: CrearTarifas,
    },
    {
        name: "updateTarifas",
        path: "/updateTarifas/:idTarifa",
        component: updateTarifas,
    },
    {
        name: "ejercicioMusculo",
        path: "/ejercicioMusculo",
        component: EjerciciosMusculo,
    },
    // {
    //     name: "piernaMuculo",
    //     path: "/piernaMuculo",
    //     component: PiernaMusculo,
    // },
    // {
    //     name: "pechoMusucu",
    //     path: "/updateTarifas/:idTarifa",
    //     component: PechoMusculo,
    // },
    // {
    //     name: "updateTarifas",
    //     path: "/updateTarifas/:idTarifa",
    //     component: updateTarifas,
    // },
    // {
    //     name: "updateTarifas",
    //     path: "/updateTarifas/:idTarifa",
    //     component: updateTarifas,
    // },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
