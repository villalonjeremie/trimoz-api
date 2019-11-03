var app = angular.module('multiCases',[]);
app.value('host', 'http://127.0.0.1:8000/');

app.controller('multiCasesCtrl',['$scope','$http','$location','host', function($scope, $http, $location, host) {

    $scope.changeNumberCase = function () {
        $scope.cases = [];

        if ($scope.numberCases > 5) {
            $scope.numberCases = 5;
        }

        for (var i = 0; i < $scope.numberCases; i++) {
            $scope.cases.push({state: 'x'});
        }
    };

    $scope.cases = [];

    $scope.callApi = function () {
        var data = {};
        $countStates = $scope.cases.length;
        for (var i = 0; i < $countStates; i++) {
            data['states['+i+']']= angular.element(document.querySelector('.case-'+i)).val();

        }

        $http({
            method: 'GET',
            url: host+'/index.php',
            params: data,
            headers : {'Accept' : 'application/json'}
        }).then(function (response){
            $scope.data = response.data;
        },function (error){
            console.log(error);

            $scope.error = [];
            $scope.error.push(error.status);
            if (angular.isArray(error.data)) {
                $scope.error.push(error.data[0]);
            } else {
                $scope.error.push(error.data);
            }
        });
    }
}])