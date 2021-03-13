import { computed, defineComponent, reactive, ref, watch } from "vue";
import DynamicTable from "../../components/DynamicTable/DynamicTable.vue";

const crudData = (route: any = null) => {
  let data: any = {
    title: 'Titulo',
    route: route,
    getter: [],
    update: '',
    keys: [],
  }

  switch (route) {
    case 'region':
      data.title = 'Regiones'
      data.update = 'getAllRegionsAsync';
      data.keys = ['id', 'name', 'code', 'created_at', 'updated_at']
      data.getter = 'regions';
      break;
    case 'concesionario':
      data.title = 'Concesionarios'
      data.update = 'getAllConcessionairesAsync';
      data.keys = ['id', 'name', 'direction', 'region', 'code', 'created_at', 'updated_at']
      data.getter = 'concessionaires';
      break;
    case 'cliente':
      data.title = 'Clientes'
      data.update = 'getAllClientsAsync';
      data.keys = ['id', 'name', 'id_number', 'email', 'phone_number', 'concessionaire', 'region', 'status', 'created_at', 'updated_at'];
      data.getter = 'clients';
      break;
    default:
      break;
  }

  return data
}

export default defineComponent({
  name: "CRUD",
  data() {
    return crudData();
  },
  methods: {
    setCrud() {
      const route = this.$route.path.replace('/', '')
      const store = this.$store;
      const data = crudData(route)
      store.dispatch(data.update);
      this.title = data.title
      this.route = data.route
      this.update = data.update
      this.getter = store.getters[data.getter]
      this.keys = data.keys

      watch(() => [store.getters.regions], ([getter]) => {
        if (this.route == 'region') this.getter = getter
      })
      watch(() => [store.getters.clients], ([getter]) => {
        if (this.route == 'client') this.getter = getter
      })
      watch(() => [store.getters.concessionaires], ([getter]) => {
        if (this.route == 'concessionaire') this.getter = getter
      })

      watch(() => [this.$route.path], ([route]) => {
        route = route.replace('/', '')
        if (route != this.route) {
          const store = this.$store;
          const data = crudData(route)
          store.dispatch(data.update);
          this.title = data.title
          this.route = data.route
          this.getter = store.getters[data.getter]
          this.update = data.update
          this.keys = data.keys
        }

      })
    }
  },
  mounted() {
    const data = this.setCrud();

  },
  components: { DynamicTable }
});