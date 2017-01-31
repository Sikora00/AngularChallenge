var app = angular.module('app', ['ngRoute', 'ngAnimate', 'ngSanitize', 'mgcrea.ngStrap']);

app.value('app-version', '0.0.1');

app.config(['$locationProvider', '$routeProvider', '$httpProvider', function ($locationProvider, $routeProvider, $httpProvider) {


    $routeProvider
        .when('/', {
            templateUrl: 'views/products.html'
        })
        .when('/challenge', {
            templateUrl: 'views/challenge.html'
        })
        .when('/404', {
            templateUrl: '404.html'
        })

    // .otherwise({redirectTo: '/404'})
    ;

    $locationProvider.html5Mode(true).hashPrefix('!');
}]);

app.controller('controller', function ($scope, $http) {
    $scope.get = function () {

        $http.get("http://server.dev/php/get.php")
            .then(function (response) {
                $scope.names = response.data.records;
            });
    };

    $scope.get();

    $scope.delete = function (id) {
        $http({
            method: "post",
            url: "http://server.dev/php/delete.php",
            data: {
                id: id
            },
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.get();
        }).error(function () {
            $scope.get();
        });
    };

    $scope.product = {};


    $scope.insert = function () {
        $http({
            method: "post",
            url: "http://server.dev/php/post.php",
            data: {
                productCode: $scope.product.Code,
                productName: $scope.product.Name,
                productLine: $scope.product.Line,
                productScale: $scope.product.Scale,
                productVendor: $scope.product.Vendor,
                productDescription: $scope.product.Description,
                quantityInStock: $scope.product.InStock,
                buyPrice: $scope.product.Price,
                MSRP: $scope.product.MSRP2
            },
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.get();
        }).error(function () {
            $scope.get();
        });
    };

    $scope.update = function (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) {
        $scope.product.Code = productCode;
        $scope.product.Name = productName;
        $scope.product.Line = productLine;
        $scope.product.Scale = productScale;
        $scope.product.Vendor = productVendor;
        $scope.product.Description = productDescription;
        $scope.product.InStock = quantityInStock;
        $scope.product.Price = buyPrice;
        $scope.product.MSRP2 = MSRP;

    };

    $scope.edytuj = function () {
        $http({
            method: "post",
            url: "http://server.dev/php/edytuj.php",
            data: {
                productCode: $scope.product.Code,
                productName: $scope.product.Name,
                productLine: $scope.product.Line,
                productScale: $scope.product.Scale,
                productVendor: $scope.product.Vendor,
                productDescription: $scope.product.Description,
                quantityInStock: $scope.product.InStock,
                buyPrice: $scope.product.Price,
                MSRP: $scope.product.MSRP2
            },
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function () {
            $scope.get();
        }).error(function () {
            $scope.get();
        });
    };


});