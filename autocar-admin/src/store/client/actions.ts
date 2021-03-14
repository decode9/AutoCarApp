import { fetchService, client, table } from "../../utils"

const getTableClientsAsync = async ({ commit, rootGetters }: any, payload: any) => {
	try {
		const auth = rootGetters.token;
		const { page, per_page } = payload
		const result = await fetchService(`${table}client?page=${page}&per_page=${per_page}`, 'get', [], auth);
		commit('setTableClients', result['result'])
	} catch (error) {
		console.log(error);
	}
}

const getAllClientsAsync = async ({ commit, rootGetters }: any) => {
	try {
		const auth = rootGetters.token;
		const result = await fetchService(client, 'get', [], auth);
		commit('setClients', result['result'])
	} catch (error) {
		console.log(error);
	}
}

export default {
	getAllClientsAsync,
	getTableClientsAsync
}