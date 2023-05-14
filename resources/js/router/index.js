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
import CrearRutina from "../components/CrearRutina.vue";
import BuscarEjercicios from "../components/BuscarEjercicios.vue";
import tuRutina from "../components/TuRutina.vue";
import gestionarEjercicios from "../components/GestionarEjericios.vue";
// import gestionarMusculos from "../components/GestionarMuculos.vue";
import createRole from "../components/createRoles.vue";
import updateEjercicio from "../components/UpdateEjercicios.vue";
import crearEjercicios from "../components/CrearEjercicio.vue";
import updateRutina from "../components/updateRutina.vue";
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
        path: "/ejercicioMusculo/:idcategoria",
        component: EjerciciosMusculo,
    },
    {
        name: "crearRutina",
        path: "/crearRutina",
        component: CrearRutina,
    },
    {
        name: "buscarEjercicios",
        path: "/buscarEjercicios",
        component: BuscarEjercicios,
    },
    {
        name: "tuRutina",
        path: "/tuRutina/:iduser",
        component: tuRutina,
    },
    {
        name: "gestionarEjercicios",
        path: "/gestionarEjercicios",
        component: gestionarEjercicios,
    },
    // {
    //     name: "gestionarMusculos",
    //     path: "/gestionarMusculos",
    //     component: gestionarMusculos,
    // },
    {
        name: "createRole",
        path: "/createRole",
        component: createRole,
    },
    {
        name: "updateEjercicio",
        path: "/updateEjercicio/:id",
        component: updateEjercicio,
    },
    {
        name: "crearEjercicio",
        path: "/crearEjercicio",
        component: crearEjercicios,
    },
    {
        name: "updateRutina",
        path: "/updateRutina/:id",
        component: updateRutina,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes: routes,
});

export default router;
