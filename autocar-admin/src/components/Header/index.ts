import { defineComponent } from "vue";


export default defineComponent({
	name: "Header",
	data() {
		return {
			user: this.$store.getters.user,
			dropdown: false
		}
	},
	methods: {
		setDrop() { this.dropdown = !this.dropdown },
		logout() {
			this.$store.dispatch('logoutAsync');
		}
	},
});