import { fetchService, login, logout } from "../../utils"
import initialState from './state'

const loginAsync = async ({ commit }: any, payload: any) => {
	try {
		const auth = payload;
		const result = await fetchService(login, 'post', auth);
		commit('setAuthData', result['result'])
	} catch (error) {
		console.log(error);
	}
}

const logoutAsync = async ({ commit, state }: any) => {
	try {
		const auth = state.auth;
		const result = await fetchService(logout, 'post', {}, auth.api_token);
		commit('setAuthData', initialState)
	} catch (error) {
		console.log(error);
	}
}

export default {
	loginAsync,
	logoutAsync
}