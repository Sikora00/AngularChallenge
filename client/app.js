var app = angular.module('app', ['ngRoute', 'ngAnimate', 'ngSanitize', 'mgcrea.ngStrap', 'ui.bootstrap', 'jcs-autoValidate']) .run([
    'bootstrap3ElementModifier',
    function (bootstrap3ElementModifier) {
        bootstrap3ElementModifier.enableValidationStateIcons(true)
    }]);

app.run(function (defaultErrorMessageResolver) {
        defaultErrorMessageResolver.getErrorMessages().then(function (errorMessages) {
            errorMessages['badScale'] = 'Skala musi być postaci 1:liczba';
        });
    }
);


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

    //link do katalogu server
    $scope.server = "http://server.dev/public";

    $scope.product = {};

    // paginacja
    $scope.names = [];
    $scope.currentPage = 1;
    $scope.numPerPage = 10;
    $scope.maxSize = 5;



    $scope.$watch('product.Page', function () {
        var begin = (($scope.product.Page - 1) * $scope.numPerPage)
            , end = begin + $scope.numPerPage;

        $scope.names = $scope.products.slice(begin, end);
    });



    $scope.getLines = function () {
        $http.get($scope.server + "/getLines")
            .then(function (response) {
                $scope.Lines = [];
                $scope.Lines = response.data;
            });
    };
    $scope.getLines();


    $scope.get = function () {
        $http.get($scope.server + "/get")
            .then(function (response) {
                $scope.products = [];
                $scope.products = response.data;
                $scope.names = $scope.products.slice(0, $scope.numPerPage);
            });
    };

    $scope.get();


    $scope.delete = function (id) {
        $http({
            method: "post",
            url: $scope.server + "/delete",
            data: {
                id: id
            },
            headers: {'Content-Type': 'application/x-www-form-urlencoded'},
            dataType: 'json'
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
            url: $scope.server + "/post",
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
            url: $scope.server + "/edytuj",
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