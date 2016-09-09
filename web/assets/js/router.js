(function(){
    var app = angular.module('router', ['ngRoute', 'controller']);

    app.config(function($routeProvider) {
        $routeProvider.when('/', {
            templateUrl: '/assets/templates/home.html',
            controller: 'homeCtrl'
        });
    });

})();