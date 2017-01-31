<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <title>Angular</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" ng-app="myApp" ng-controller="customersCtrl">

    <table class="table table-hover table-condensed">
        <thead>
        <tr>
            <th>#</th>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Stanowisko</th>
            <th>Płaca</th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <tr ng-repeat="x in names">
            <input type="hidden" name="nazwa" value="{{x.id}}" ng-model="id"/>
            <td>{{ x.id }}</td>
            <td>{{ x.imie }}</td>
            <td>{{ x.nazwisko }}</td>
            <td>{{ x.stanowisko }}</td>
            <td>{{ x.pensja }}</td>
            <td><button class="btn btn-success" ng-click="update(x.id, x.imie, x.nazwisko, x.stanowisko, x.pensja)">Edytuj</button></td>
            <td><button class="btn btn-danger" ng-click="delete(x.id)">Usuń</button></td>
        </tr>
        </tbody>
    </table>



    <form action="#" method="post" class="form-horizontal" onsubmit="return false;">
        <div class="form-group">
            <input type="hidden" value="{{id}}" ng-model="identyfikator">
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="{{imie}}" ng-model="namae">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="{{nazwisko}}" ng-model="naz">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text"  value="125" class="form-control" placeholder="{{stanowisko}}" ng-model="st">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-10">
                <input type="text" class="form-control" placeholder="{{pensja}}" ng-model="plac">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-inverse btn-info" ng-click="insert();">Dodaj pracownika</button>
                <td><button class="btn btn-success" ng-click="edytuj()">Edytuj</button></td>
            </div>
        </div>
    </form>
    <div style="text-align:center;"><h1 id="odp">{{odp}}</h1></div>
</div>

</div>

<script>
    var app = angular.module('myApp', []);
    app.controller('customersCtrl', function($scope, $http) {
        $http.get(window.location.href + "php/get.php")
            .then(function (response) {$scope.names = response.data.records;});
        $scope.imie="Imie";
        $scope.nazwisko="Nazwisko";
        $scope.stanowisko="Stanowsiko";
        $scope.pensja="Pensja";
        $scope.insert=function(){
            alert($scope.namae);

            $http({
                method: "post",
                url: window.location.href + "php/post.php",
                data: {
                    imie: $scope.namae,
                    nazw: $scope.naz,
                    stanowisko: $scope.st,
                    placa: $scope.plac
                },
                dataType: 'json',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function (data) {
                $scope.odp = data;
                $http.get(window.location.href + "php/get.php")
                    .then(function (response) {$scope.names = response.data.records;});
            });
        };
        $scope.delete=function(id) {
            $http({
                method: "post",
                url: window.location.href + "php/delete.php",
                data: {
                    id: id
                },
                dataType: 'json',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            }).success(function (data) {
                $scope.odp = data;
                $http.get(window.location.href + "php/get.php")
                    .then(function (response) {$scope.names = response.data.records;});
            });
        };
        $scope.update=function(id, imie, nazwisko, stanowisko, pensja)
        {
            $scope.id=id;
            $scope.imie=imie;
            $scope.nazwisko=nazwisko;
            $scope.stanowisko=stanowisko;
            $scope.pensja=pensja;
            
        };
        $scope.edytuj=function(){
            $http({
                method: "post",
                url: window.location.href + "php/edytuj.php",
                data: {
                    id:$scope.id,
                    imie: $scope.namae,
                    nazw: $scope.naz,
                    stanowisko: $scope.st,
                    placa: $scope.plac
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
</script>
</body>
</html>