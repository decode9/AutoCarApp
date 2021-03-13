import { defineComponent } from "vue";


export default defineComponent({
	data() {
		return {
			routes: [
				{
					label: 'Regiones',
					route: '/region'
				},
				{
					label: 'Concesionarios',
					route: '/concesionario'
				},
				{
					label: 'Clientes',
					route: '/cliente'
				}
			]
		}
	},
	name: "SideBar"
});