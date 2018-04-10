
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
// m of viewJS
// obj มี attr และ method
// data คือ perproty
// el คือ id ที่ map กับ view
const app = new Vue({
    el: '#vue-app',
    data: {
        number: 0,
        text:"hello poom",
        seconds:3*60+20,
        isShowTimeButton: true,
        todos: [],
        item:""
    },computed: {
        hourText: function() {
            return Math.floor(this.seconds / (60*60));
        },minuteText: function() {
            return Math.floor(this.seconds % (60 * 60) / 60);
        },secoundText: function() {
            return this.seconds % 60;
        },showTimeText: function() {
            return this.hourText + " : " + this.minuteText + " : " + this.secoundText;
        }
    },methods: {
        increaseNumber: function() {
            this.number += 10;
        }, increaseTime: function() {
            this.seconds = parseInt(this.seconds) + 1;
        }, decreaseTime: function() {
            this.seconds = parseInt(this.seconds) - 1;
        }, toggleTimeButton: function() {
            this.isShowTimeButton = !this.isShowTimeButton;
        }, appendItem: function() {
            if (this.item != "") {
                this.todos.push(this.item);
            }
            this.item = "";
        }
    }
});
