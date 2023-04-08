import { createStore } from "vuex";

// Importing stores
import auth from "./auth";
import users from "./users";

export default createStore({
    modules: {
        auth,
        users
    }
})