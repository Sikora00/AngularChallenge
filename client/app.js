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

        .otherwise({redirectTo: '/404'})
    ;

    $locationProvider.html5Mode(true).hashPrefix('!');
}]);

app.controller('controller', function ($scope, $http) {
    $http.get(window.location.href + "php/get.php")
        .then(function (response) {
            $scope.names = response.data.records;
        });

    $scope.delete = function (id) {
        $http({
            method: "post",
            url: window.location.href + "php/delete.php",
            data: {
                id: id
            },
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            $scope.odp = data;
            $http.get(window.location.href + "php/get.php")
                .then(function (response) {
                    $scope.names = response.data.records;
                });
        });
    };

    $scope.insert = function () {
        $http({
            method: "post",
            url: window.location.href + "php/post.php",
            data: {
                productCode: $scope.productCode,
                productName: $scope.productName,
                productLine: $scope.productLine,
                productScale: $scope.productScale,
                productVendor: $scope.productVendor,
                productDescription: $scope.productDescription,
                quantityInStock: $scope.quantityInStock,
                buyPrice: $scope.buyPrice,
                MSRP: $scope.MSRP
            },
            dataType: 'json',
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        }).success(function (data) {
            $scope.odp = data;
            $http.get(window.location.href + "php/get.php")
                .then(function (response) {
                    alert($scope.productName);

                    $scope.names = response.data.records;
                });
        });
    };

    $scope.update=function(productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP)
    {
        $scope.productCode = productCode;
        $scope.productName= productName;
        $scope.productLine=productLine;
        $scope.productScale=productScale;
        $scope.productVendor=productVendor;
        $scope.productDescription=productDescription;
        $scope.quantityInStock=quantityInStock;
        $scope.buyPrice=buyPrice;
        $scope.MSRP=MSRP;

    };

    $scope.edytuj=function(){
        $http({
            method: "post",
            url: window.location.href + "php/edytuj.php",
            data: {
                productCode: $scope.productCode,
                productName: $scope.productName,
                productLine: $scope.productLine,
                productScale: $scope.productScale,
                productVendor: $scope.productVendor,
                productDescription: $scope.productDescription,
                quantityInStock: $scope.quantityInStock,
                buyPrice: $scope.buyPrice,
                MSRP: $scope.MSRP
            },
            dataType: 'json',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
        }).success(function (data) {
            $scope.odp = data;
            $http.get(window.location.href + "php/get.php")
                .then(function (response) {$scope.names = response.data.records;});
        });
    };


});