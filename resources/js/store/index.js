import { createStore } from "vuex";

// Importing stores
import auth from "./auth";
import jobs from "./jobs";
//import users from "./users";

export default createStore({
    modules: {
        auth,
        jobs
        //users
    }
})