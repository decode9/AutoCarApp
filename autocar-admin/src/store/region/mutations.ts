
const setRegions = (state: any, payload: any) => state.region.regions = payload
const setTableRegions = (state: any, payload: any) => state.region.table = payload

export default {
	setRegions,
	setTableRegions
}