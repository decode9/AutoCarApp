import { defineComponent, watch } from "vue";


export default defineComponent({
	name: "DynamicTable",
	props: {
		keys: Array,
		records: Array,
		current_page: Number,
		per_page: String,
		last_page: Number,
		update: String,
	},
	data() {
		return {
			pages: [],
			perPage: (this.per_page) ? this.per_page : 10,
			dispatch: (this.update) ? this.update : '',
		}
	},
	mounted() {
		this.pages = this.getPages();
		watch(() => [this.current_page, this.last_page, this.update], (current_page, previus_page) => {
			this.dispatch = (this.update) ? this.update : '';
			this.pages = this.getPages();
		})
		watch(() => this.perPage, () => {
			this.$store.dispatch(this.dispatch, { per_page: this.perPage, page: 1 })
		});
	},
	methods: {
		iteractPages(pages: any) {
			let newPages: any = []
			const totalPages = (this.last_page) ? this.last_page : 1
			const maxPages = (totalPages > pages + 5) ? pages + 5 : totalPages
			for (let page = pages; page <= maxPages; page++) {
				if (page > 0) newPages.push(page);
			}
			return newPages
		},
		getPages() {
			let pages: any = [];
			const page = (this.current_page) ? this.current_page : 1
			const totalPages = (this.last_page) ? this.last_page : 1
			switch (page) {
				case 1:
					pages = this.iteractPages(page)
					break;
				case 2:
					pages = this.iteractPages(page - 1)
					break;
				case totalPages:
					pages = this.iteractPages(page - 5)
					break;
				case totalPages - 1:
					pages = this.iteractPages(page - 4)
					break;
				default:
					pages = this.iteractPages(page - 2);
					break;
			}
			return pages;
		},
		reloadPages(page: any) {
			page = (page) ? page : this.current_page
			this.$store.dispatch(this.dispatch, { per_page: this.perPage, page: page })
		}
	},
});