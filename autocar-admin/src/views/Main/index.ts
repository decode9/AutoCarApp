import { defineComponent, watch } from "vue";
import { Router, useRouter } from "vue-router";
import { useStore } from "vuex";
import { key } from "../../store";

export default defineComponent({
	name: "Main",
	setup() {
		const store = useStore(key)
		const router: Router = useRouter();
		const dashboard = () => router.push('/');
		const login = () => router.push('/login');
		const token = store.getters.token
		if (token && router.currentRoute.value.path == '/login') dashboard();
		if (!token) login();

		watch(
			() => store.getters.token, (auth: any) => {
				if (auth) return dashboard();
				if (!auth) return login();
			}
		)
	}
});