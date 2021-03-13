import { defineComponent } from "vue";


export default defineComponent({
	name: "DynamicTable",
	props: {
		keys: Array,
		records: Array,
	},
	methods: {
	},
});