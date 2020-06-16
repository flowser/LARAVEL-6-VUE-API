import moment from 'moment';
import Vue from 'vue';
Vue.filter('upText', function (text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('dateformat', function (created) {
    return moment(created).format('MMM Do YYYY');
});
Vue.filter('year', function (created) {
    return moment(created).format('YYYY');
});
Vue.filter('timeformat', function (created) {
    return moment(created).format('h:mm:ss a');
});

Vue.filter('sortlength', function (text, length, suffix) {
    return text.substring(0, length) + suffix;
});
Vue.filter('currency', function (text, currency) {
    return currency +". "+ text;
});
Vue.filter('mailremove', function (string, length, suffix) {
    // return string.substring(0, 15) + '...';
     string = string.substring(0, string.indexOf('<'));
     return "" +string;
});

Vue.filter('createdAt', function (value) {
    return moment(value).fromNow();
});

Vue.filter('PassedDaystoExpiry', function (Expiry_value, createdate_value, ) {
    var expiryDate = moment(createdate_value).add(Expiry_value, 'd');
    var now = moment();
    return expiryDate.diff(now, 'days');
});

Vue.filter('ExpiryDate', function (Expiry_value, createdate_value, ) {
    var expiryDate = moment(createdate_value).add(Expiry_value, 'd');
    return moment(expiryDate).format('MMM Do YYYY');
});
Vue.filter('Today', function () {
    var now = moment();
    return moment(now).format('YYYYMMDDHHmmss');
});
Vue.filter('Size', function (bytes, decimals = 2){
    if (bytes === 0) return '0 Bytes';

   const k = 1024;
   const dm = decimals < 0 ? 0 : decimals;
   const sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];

   const i = Math.floor(Math.log(bytes) / Math.log(k));

   return parseFloat((bytes / Math.pow(k, i)).toFixed(dm)) + ' ' + sizes[i];
});


