//login
namespaced: true;

const state = {
        accessToken: localStorage.getItem('accessToken') || null,
        user: '',
        userid: localStorage.getItem('storeduserid') || null ,
        roles: '',
        permissions: '',
        emailreviews: '',
    },
    getters = {
        Token(state) {
            return state.accessToken;
        },
        loggedIn(state) {
            return state.accessToken !== null;
        },
        LoggedUser(state) {
            return state.user;
        },
        Userid(state) {
            return state.userid;
        },
        UserRoles(state) {
            return state.roles;
        },
        UserPermissions(state) {
            return state.permissions;
        },
        Useremailreviews(state) {
            return state.emailreviews;
        }
    };
const actions = {
    login({ commit }, credentials) {
        return new Promise((resolve, reject) => {
            axios.post('/api/login', credentials)
                .then(response => {
                    console.log(credentials, response);
                    localStorage.setItem('accessToken', response.data.access_token);
                    commit('updateAccessToken', response.data.access_token);
                    resolve(response)
                })
                .catch(error => {
                    commit('updateAccessToken', null);
                    console.log(error, 'error');
                    reject(error);
                });
        });
    },
    fetchAccessToken(context, dispatch) {
        context.commit('updateAccessToken', localStorage.getItem('accessToken'));
        this.dispatch('getUser');
    },
    getUser(context) {
        console.log(context.state.accessToken, 'token')
        console.log(context.getters.loggedIn, 'loggedin')
        if (context.getters.loggedIn) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.accessToken;
            return new Promise((resolve, reject) => {
                axios.get('/api/user')
                    .then((response) => {
                        console.log('rolesraw', response.data.user);
                        localStorage.setItem('storeduserid', response.data.user.id);

                        context.commit('userid', response.data.user.id);
                        context.commit('user', response.data.user);
                        context.commit('roles', response.data.roles);
                        context.commit('permissions', response.data.permissions);
                         context.dispatch('syncmails');
                        // context.dispatch('MailByUserId', response.data.user.id);

                        // backend
                        resolve(response);


                        // let roles = response.data.user.roles[0].name;
                        // if ((roles === 'Superadmin')) {
                        //     context.dispatch('syncmails');
                        // }
                    })
                    .catch(error => {
                        context.commit('destroyUser');
                        localStorage.removeItem('storeduserid');
                        context.commit('user', null);
                        context.commit('roles', null);
                        context.commit('permissions', null);
                        // context.dispatch('fetchAccessToken');
                        // context.dispatch('getUserRoles');

                        reject(error);
                    });
            });
        }
    },
    fetchUserId(context, dispatch) {
        context.commit('getuserid', localStorage.getItem('storeduserid'));
    },
    destroyToken(context) { //done only whne logged in
        axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.accessToken;
        if (context.getters.loggedIn) {
            return new Promise((resolve, reject) => {
                axios.post('/api/logout')
                    .then(response => {
                        localStorage.removeItem('accessToken');
                        context.commit('destroyToken');
                        resolve(response);
                    })
                    .catch(error => {
                        localStorage.removeItem('accessToken');
                        context.commit('destroyToken');
                        context.commit('destroyUser');
                        reject(error);
                    });
            });
        }
    },
    // MailByUserId(context, payload) {
    //     console.log('getting dispatched', payload);
    // if (context.getters.loggedIn) {
    //     axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.state.accessToken;
    //     return new Promise((resolve, reject) => {
    //         let url = '/api/get/mail/';
    //         axios.get(url)
    //             .then((response) => {
    //                 console.log(response.data.user, 'user responygh');
    //                 console.log(response.data.emailreviews, 'emailreviews responygh');
    //                 context.commit('emailreviews', response.data.emailreviews);
    //                 resolve(response);
    //             })
    //             .catch(error => {
    //                 console.log(error, 'error');
    //                 reject(error);
    //             });
    //     });
    // }
    // },
};
const mutations = {
    updateAccessToken: (state, accessToken) => {
        state.accessToken = accessToken;
    },
    getuserid: (state, data) => {
        state.userid = data;
    },
    destroyToken(state) {
        state.accessToken = null;
    },
    user(state, data) {
        state.user = data;
    },
    userid(state, data) {
        state.userid = data;
    },
    roles(state, data) {
        state.roles = data;
    },
    permissions(state, data) {
        state.permissions = data;
    },
    destroyUser(state) {
        state.user = null;
        state.roles = null;
        state.permissions = null;
    },
    emailreviews(state, data) {
        state.emailreviews = data;
    },
};
export default {
    // namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
