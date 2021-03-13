import { fetchService, client } from "../../utils"

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
}