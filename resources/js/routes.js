import Vue from "vue";
import VueRouter from "vue-router";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: "history",
    routes: [
        {
            path: "/register",
            component: () => import("./components/MemberRegister")
        },
        {
            path: "/login",
            component: () => import("./components/MemberLogin")
        }
    ]
});

export default router;
