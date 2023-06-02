import axios from 'axios';
import { comment } from 'postcss';

const state = {
    data: [],
    loading: false,
    isDataCached: false,
}
  
const mutations = {
    GET_ALL_JOBS(state, jobs) {
        state.data = jobs.reverse();
    },
    SET_LOADING(state, loading) {
        state.loading = loading;
    },
    SET_CACHED(state, cached){
        state.isDataCached = cached;
    },
    ADD_NEW_JOB(state, job){
        state.data.unshift(job);
    }
}
  
const actions = {
    getAllJobs({ commit, state }) {
        if(!state.isDataCached){
            commit('SET_LOADING', true);
            axios.get('http://127.0.0.1:8000/api/jobs').then((response) => {
                commit('GET_ALL_JOBS', response.data.data);
                commit('SET_CACHED', true);
            }).catch((error) => {
                console.log(error);
            }).finally(() => {
                commit('SET_LOADING', false);
            })
        }
    },

    addNewJob({commit}, job){
        commit('ADD_NEW_JOB', job);
    },

    getJobById({commit}, id){
        
    },
    editJob({ commit }){
1
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