
const setClients = (state: any, payload: any) => {
	state.client.clients = payload.map((data: any) => {
		let newData: any = {}
		const keys = ['id', 'name', 'id_number', 'email', 'phone_number', 'concessionaire', 'region', 'status', 'created_at', 'updated_at'];
		for (let key of keys) {
			if (typeof data[key] == 'object') {
				newData[key] = data[key]['name']
				newData['region'] = data[key]['region']['name'];
			}
			if (data[key] && typeof data[key] != 'object') newData[key] = data[key]
		}
		return newData;
	});
}

export default {
	setClients
}