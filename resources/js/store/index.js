
import login from './modules/login/login';
// passport
import tokens from './modules/passport/tokens';

export default {
    modules: {
        //user logins, tokens roles etc
        login,
        tokens,
    },
};
