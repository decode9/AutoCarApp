import { fetchService, concessionaire, table } from "../../utils"

const getTableConcessionairesAsync = async ({ commit, rootGetters }: any, payload: any) => {
	try {
		const auth = rootGetters.token;
		const { page, per_page } = payload
		const result = await fetchService(`${table}concessionaire?page=${page}&per_page=${per_page}`, 'get', [], auth);
		commit('setTableConcessionaires', result['result'])
	} catch (error) {
		console.log(error);
	}
}

const getAllConcessionairesAsync = async ({ commit, rootGetters }: any) => {
	try {
		const auth = rootGetters.token;
		const result = await fetchService(concessionaire, 'get', [], auth);
		commit('setConcessionaires', result['result'])
	} catch (error) {
		console.log(error);
	}
}

export default {
	getAllConcessionairesAsync,
	getTableConcessionairesAsync
}