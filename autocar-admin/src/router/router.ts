import { createWebHistory, createRouter } from "vue-router";
import Crud from "../views/Crud/Crud.vue";
import Dashboard from "../views/Dashboard/Dashboard.vue";
import Login from '../views/Login/Login.vue'
import Main from "../views/Main/Main.vue";

const routes = [
	{
		path: "/",
		name: "Main",
		component: Main,
		children: [
			{
				path: "/login",
				name: "Login",
				component: Login,
			},
			{
				path: "/",
				name: "Dashboard",
				component: Dashboard,
				children: [
					{
						path: "/region",
						name: "Region",
						component: Crud,
					},
					{
						path: "/concesionario",
						name: "Concessionaire",
						component: Crud,
					},
					{
						path: "/cliente",
						name: "Client",
						component: Crud,
					},
				]
			}
		]
	}
];

const router = createRouter({
	history: createWebHistory(),
	routes,
});

export default router;