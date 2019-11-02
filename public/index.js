

var app = angular.module('multiCases',[]);

app.controller('multiCasesCtrl',['$scope',function($scope) {

    $scope.changeNumberCase = function () {
        console.log($scope.numberCase);
    }

}]);