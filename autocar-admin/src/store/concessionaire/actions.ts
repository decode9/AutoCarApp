import { fetchService, concessionaire } from "../../utils"

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
}