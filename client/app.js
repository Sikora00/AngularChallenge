var app = angular.module('app', ['ngRoute', 'ngAnimate', 'ngSanitize', 'mgcrea.ngStrap']);

app.value('app-version', '0.0.1');

app.config(['$locationProvider', '$routeProvider', '$httpProvider', function ($locationProvider, $routeProvider, $httpProvider) {

    $routeProvider
        .when('/',{
            templateUrl: 'views/products.html'
        })
        .when('/challenge',{
            templateUrl: 'views/challenge.html'
        })
        .when('/404', {
            templateUrl: '404.html'
        })

        .otherwise({redirectTo: '/404'})
    ;

    $locationProvider.html5Mode(true).hashPrefix('!');
}]);
