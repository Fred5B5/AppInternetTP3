var app = angular.module('linkedlists', []);

app.controller('emplacementsController', function ($scope, $http) {
    $http.get(urlToLinkedListFilter).then(function (response) {
        $scope.emplacements = response.data;
    });
});