import axios from 'axios';
import { comment } from 'postcss';

const state = {
    data: [],
    loading: false,
    isDataCached: false,
    single_job: {},
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
    },
    ADD_SINGLE_JOB(state, job){
        state.single_job = job;
    },
    UPDATE_JOB_POST(state, job){
        state.single_job = job;
        // update a data item in the state
        const index = state.data.findIndex(jobItem => jobItem.id === job.id);
        if (index !== -1) {
            state.data.splice(index, 1, job);
        }
    },
    DELETE_JOB(state, id){
        const index = state.data.findIndex(jobItem => jobItem.id === id);
        if (index !== -1) {
            state.data.splice(index, 1);
        }
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

    fetchJobById({commit}, id){
        commit('SET_LOADING', true);
        axios.get('http://127.0.0.1:8000/api/jobs/' + id).then((response) => {
            commit('ADD_SINGLE_JOB', response.data.data);
        }).catch((error) => {
            console.log(error);
        }).finally(() => {
            commit('SET_LOADING', false);
        })
},
    editJob({ commit }, job){
        commit('UPDATE_JOB_POST', job);
    },
    deleteJob({ commit }, id){
        axios.delete('http://127.0.0.1:8000/api/jobs/' + id).then((response) => {
            commit('DELETE_JOB', id);
        }).catch((error) => {
            console.log(error);
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