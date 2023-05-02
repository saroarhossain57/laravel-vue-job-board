const state = {
    user: null
}
  
const mutations = {
    ADD_AUTH_USER(state, user) {
        state.user = user
    }
    // SET_USERS(state, users) {
    //   state.users = users
    // },
    // ADD_USER(state, user) {
    //   state.users.push(user)
    // },
    // UPDATE_USER(state, { index, user }) {
    //   state.users[index] = user
    // },
    // DELETE_USER(state, index) {
    //   state.users.splice(index, 1)
    // }
}
  
const actions = {
    addAuthUser({ commit }, user) {

        commit('ADD_AUTH_USER', user)
    }   
    // getUsers({ commit }) {
    //   // Call API to get users data
    //   const users = [{ id: 1, name: 'John Doe' }, { id: 2, name: 'Jane Doe' }]
    //   commit('SET_USERS', users)
    // },
    // addUser({ commit }, user) {
    //   // Call API to add user data
    //   commit('ADD_USER', user)
    // },
    // updateUser({ commit }, { index, user }) {
    //   // Call API to update user data
    //   commit('UPDATE_USER', { index, user })
    // },
    // deleteUser({ commit }, index) {
    //   // Call API to delete user data
    //   commit('DELETE_USER', index)
    // }
}
  
const getters = {
    // getUserById: (state) => (id) => {
    //   return state.users.find((user) => user.id === id)
    // }
}
  
export default {
    namespaced: true,
    state,
    mutations,
    actions,
    getters
}