
const setConcessionaires = (state: any, payload: any) => {
	state.concessionaire.concessionaires = payload.map((data: any) => {
		let newData: any = {}
		const keys = ['id', 'name', 'direction', 'region', 'code', 'created_at', 'updated_at'];
		for (let key of keys) {
			if (typeof data[key] == 'object') newData[key] = data[key]['name']
			if (data[key] && typeof data[key] != 'object') newData[key] = data[key]
		}
		return newData;
	});
}

export default {
	setConcessionaires
}