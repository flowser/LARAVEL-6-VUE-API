
//token module

const state = {
    token:[],
    tokens:[],
    pagination:[],
  };
const getters = {
    Tokens(state){
      return state.tokens;
    },
    Token(state){
      return state.token;
    },
    TokenPagination(){
        return state.pagination;
    },
  };
const actions = {
    GetTokens(context,url){//permission.index route laravel
        if (context.rootGetters.loggedIn) {
            axios.defaults.headers.common['Authorization'] = 'Bearer ' + context.rootState.login.accessToken;
            return new Promise((resolve, reject) =>{
                axios.get('/api/oauth/tokens')
                .then((response)=>{
                    context.commit('tokens', response.data);
                    // context.commit('pagination', response.data.tokens);
                    resolve(response);
                })
                .catch(error => {
                    console.log(error, 'error');
                    reject(error);
                });
            });
        }
    },
    TokenPush(context, payload){
          context.commit('tokenpush', payload);
    },
    TokenUpdate(context, payload){
          context.commit('tokenupdate', payload);
    },
    TokenDelete(context, payload){
          context.commit('tokendelete', payload);
    },

}
const mutations = {
    tokenpush(state, data){
        return state.tokens.push(data);
    },
    tokenupdate(state, data){
        const index = state.tokens.findIndex(token => token.id === data.id);
        // using Array.splice
        return state.tokens.splice(index, 1, data);
    },
    tokendelete(state, data){
        const index = state.tokens.findIndex(token => token.id === data.id);
        // using Array.splice remove deleted id object
        return state.tokens.splice(index, 1);
    },
    tokens(state, data){
      return state.tokens = data;
    },
    pagination(state, data){
        var pagination = {
            current_page: data.current_page,
            last_page: data.last_page,
            from: data.from,
            to: data.to,
            total: data.total,
            next_page_url: data.next_page_url,
            prev_page_url: data.prev_page_url,
        }
        return state.pagination = pagination;
    },
  };

export default {
  // namespaced: true,
  state,
  getters,
  actions,
  mutations
};









