angular.module('app', ['ngRoute', 'duScroll', 'app.controllers'])
    .config(function ($routeProvider) {
        $routeProvider
            .when('/', {
                templateUrl: '/views/home.html',
                controller: 'IndexController'
            })
    }).value('duScrollOffset', 30);
