import { InjectionKey } from 'vue'
import { createStore, Store } from 'vuex'
import auth from './auth'
import VuexPersistence from 'vuex-persist'
import region from './region'
import concessionaire from './concessionaire'
import client from './client'

export interface State {
	auth: any,
	region: any,
	concessionaire: any,
	client: any,
}

export const key: InjectionKey<Store<State>> = Symbol()

export const store = createStore({
	modules: {
		auth: auth,
		region: region,
		concessionnaire: concessionaire,
		client: client
	},
	plugins: [new VuexPersistence().plugin]
})