import { fetchService, region } from "../../utils"

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
	getAllRegionsAsync,
}