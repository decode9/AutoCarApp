import { defineComponent } from "vue";
import Header from "../../components/Header/Header.vue";
import SideBar from "../../components/SideBar/SideBar.vue";


export default defineComponent({
	name: "Dashboard",
	components: { Header, SideBar }
});