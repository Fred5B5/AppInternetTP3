var app = angular.module('app',[]);

app.controller('EmplacementsController', ['$scope','EmplacementService', function ($scope,EmplacementService) {
	  
    $scope.updateEmplacement = function () {
        EmplacementService.updateEmplacement($scope.emplacement.id,$scope.emplacement.nom_emplacement,$scope.emplacement.accronyme_emplacement,$scope.emplacement.actif)
          .then(function success(response){
              $scope.message = 'Emplacement data updated!';
              $scope.errorMessage = '';
          },
          function error(response){
              $scope.errorMessage = 'Error updating emplacement!';
              $scope.message = '';
          });
    }
    
    $scope.getEmplacement = function () {
        var id = $scope.emplacement.id;
        EmplacementService.getEmplacement($scope.emplacement.id)
          .then(function success(response){
              $scope.emplacement = response.data;
              $scope.emplacement.id = id;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message = '';
              if (response.status === 404){
                  $scope.errorMessage = 'Emplacement not found!';
              }
              else {
                  $scope.errorMessage = "Error getting emplacement!";
              }
          });
    }
    
    $scope.addEmplacement = function () {
        if ($scope.emplacement != null && $scope.emplacement.nom_emplacement) {
            EmplacementService.addEmplacement($scope.emplacement.nom_emplacement, $scope.emplacement.accronyme_emplacement, $scope.emplacement.actif)
              .then (function success(response){
                  $scope.message = 'Emplacement added!';
                  $scope.errorMessage = '';
              },
              function error(response){
                  $scope.errorMessage = 'Error adding emplacement!';
                  $scope.message = '';
            });
        }
        else {
            $scope.errorMessage = 'Please enter a nom_emplacement!';
            $scope.message = '';
        }
    }
    
    $scope.deleteEmplacement = function () {
        EmplacementService.deleteEmplacement($scope.emplacement.id)
          .then (function success(response){
              $scope.message = 'Emplacement deleted!';
              $scope.emplacement = null;
              $scope.errorMessage='';
          },
          function error(response){
              $scope.errorMessage = 'Error deleting emplacement!';
              $scope.message='';
          })
    }
    
    $scope.getAllEmplacement = function () {
        EmplacementService.getAllEmplacement()
          .then(function success(response){
              $scope.emplacements = response.data._embedded.emplacements;
              $scope.message='';
              $scope.errorMessage = '';
          },
          function error (response ){
              $scope.message='';
              $scope.errorMessage = 'Error getting emplacements!';
          });
    }

}]);

app.service('EmplacementService',['$http', function ($http) {
	
    this.getEmplacement = function getEmplacement(emplacementId){
        return $http({
          method: 'GET',
          url: 'emplacements/'+emplacementId
        });
	}
	
    this.addEmplacement = function addEmplacement(nom_emplacement, accronyme_emplacement, actif){
        return $http({
          method: 'POST',
          url: 'emplacements',
          data: {nom_emplacement:nom_emplacement, accronyme_emplacement:accronyme_emplacement, actif:actif}
        });
    }
	
    this.deleteEmplacement = function deleteEmplacement(id){
        return $http({
          method: 'DELETE',
          url: 'emplacements/'+id
        })
    }
	
    this.updateEmplacement = function updateEmplacement(id,nom_emplacement,accronyme_emplacement,actif){
        return $http({
          method: 'PATCH',
          url: 'emplacements/'+id,
          data: {nom_emplacement:nom_emplacement, accronyme_emplacement:accronyme_emplacement, actif:actif}
        })
    }
	
    this.getAllEmplacement = function getAllEmplacement(){
        return $http({
          method: 'GET',
          url: 'emplacements'
        });
    }

}]);