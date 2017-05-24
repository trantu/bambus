// script.js

// create the module and name it scotchApp
// also include ngRoute for all our routing needs
var scotchApp = angular.module('App', ['ngRoute',"xeditable",'colorpicker.module']);

scotchApp.filter('getAddress', function () {
    return function (item) {

        if(item==''||item==null){
            return "";
        }
        try {
            JSON.parse(item);
            var item=angular.fromJson(item);
            return item.stress+" ...";
        } catch (e) {

            return item;

        }
        //return true;
        // if(angular.fromJson(item)){
        //     var item=angular.fromJson(item);
        // }else{
        //     return item;
        // }

        //return item.stress+" ...";
    };
});

// configure our routes
scotchApp.config(function($routeProvider) {
    $routeProvider

    // route for the login page
        .when('/groups', {
            templateUrl : '../admin/templates/groups.html',
            controller  : 'groupsController'
        })
        .when('/products', {
            templateUrl : '../admin/templates/products.html',
            controller  : 'productsController'
        })
        .when('/settings', {
            templateUrl : '../admin/templates/settings.html',
            controller  : 'settingsController'

        })
        .when('/orders', {
            templateUrl : '../admin/templates/orders.html',
            controller  : 'ordersController'

        })
        .otherwise({ redirectTo: '/' });

}).run(function () {


});






