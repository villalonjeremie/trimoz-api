

var app = angular.module('multiCases',[]);

app.controller('multiCasesCtrl',['$scope','$http',function($scope, $http) {
    $scope.changeNumberCase = function () {
        $scope.cases = [];

        if ($scope.numberCases > 5) {
            $scope.numberCases = 5;
        }

        for (var i = 0; i < $scope.numberCases; i++) {
            $scope.cases.push({state: 'x'});
        }
    }

    $scope.cases = [{number: 'x'}];

    $scope.callApi = function () {
        var onSuccess = function (data, status, headers, config) {
            $scope.data = data;
        };

        var onError = function (data, status, headers, config) {
            $scope.error = status;
        };

        $http({
            method: 'GET',
            url: 'http://127.0.0.1:8005/index.php?states[0]=.&states[1]=.&states[2]=c'
        }).then(function (response){
            $scope.data = response.data;
        },function (error){
            $scope.error = [];
            $scope.error.push(error.status);
            $scope.error.push(error.data[0].message);
        });
    }
}]);