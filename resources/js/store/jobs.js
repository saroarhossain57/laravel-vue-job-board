import axios from 'axios';

const state = {
    data: [],
    loading: false,
}
  
const mutations = {
    GET_ALL_JOBS(state, jobs) {
        state.data = jobs
    },
    SET_LOADING(state, loading) {
        state.loading = loading;
    }
}
  
const actions = {
    getAllJobs({ commit }, jobs) {

        commit('SET_LOADING', true);

        axios.get('http://127.0.0.1:8000/api/jobs').then((response) => {
            commit('GET_ALL_JOBS', response.data.data);
        }).catch((error) => {
            console.log(error);
        }).finally(() => {
            commit('SET_LOADING', false);
        })
    }  
}
  
const getters = {}
  
export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}