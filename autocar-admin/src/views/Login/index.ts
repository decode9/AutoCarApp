import { defineComponent } from "vue";

export default defineComponent({
	name: "Login",
	data() {
		return { form: { email: '', password: '' }, send: false }
	},
	methods: {
		login() {
			const form = this.form;
			if (form.email && form.password) {
				this.$store.dispatch('loginAsync', this.form);
				this.send = true;
			}
		}
	}
});