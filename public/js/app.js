angular.module('app', ['ngRoute', 'app.controllers'])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '/views/home.html',
                controller: 'IndexController'
            })
            .when('/about', {
                templateUrl: '/views/about.html',
                controller: 'IndexController'
            })
    });
