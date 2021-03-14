import { fetchService, region, table } from "../../utils"


const getTableRegionsAsync = async ({ commit, rootGetters }: any, payload: any) => {
	try {
		const auth = rootGetters.token;
		const { page, per_page } = payload
		const result = await fetchService(`${table}region?page=${page}&per_page=${per_page}`, 'get', [], auth);
		commit('setTableRegions', result['result'])
	} catch (error) {
		console.log(error);
	}
}
const getAllRegionsAsync = async ({ commit, rootGetters }: any) => {
	try {
		const auth = rootGetters.token;
		const result = await fetchService(region, 'get', [], auth);
		commit('setRegions', result['result'])
	} catch (error) {
		console.log(error);
	}
}

export default {
	getTableRegionsAsync,
	getAllRegionsAsync
}