/**
*  Module: Welcome Controller
*
* Description: Random Words Home
*/
angular.module('ProyectosController', ['app','ngMask'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('ProyectosController', function ProyectosController($http, $scope) {

  // Detalle Proyecto
  // $scope.proyecto = {};
  // $http.jsonp('https://api.behance.net/v2/projects/' + $routeParams.id + '?client_id=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
  //   .then(function (response) {
  //     $scope.proyecto = response.data.project;
  //     console.log($scope.proyecto);
  //   });

  // Colecciones Behance
  $scope.collections = {};
  $http.jsonp('https://api.behance.net/v2/users/concepthausmx/collections?client_id=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
  .then(function (response) {
    $scope.collections = response.data.collections;
  })

  // Colección ConceptHaus
  $scope.collectionConcept = {};
  $http.jsonp('https://www.behance.net/v2/collections/168765131/projects?api_key=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
  .then(function (response) {
    $scope.collectionConcept = response.data.projects;
  })

  // Colección InHaus
  $scope.collectionInHaus = {};
  $http.jsonp('https://www.behance.net/v2/collections/168765133/projects?api_key=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
  .then(function (response) {
    $scope.collectionInHaus = response.data.projects;
  })

  // Colección TreeHaus
  $scope.collectionTreeHaus = {};
  $http.jsonp('https://www.behance.net/v2/collections/168765137/projects?api_key=aeyWwVoxxS9DxTLvJ0W6scIauKj3Bpbg&callback=JSON_CALLBACK')
  .then(function (response) {
    $scope.collectionTreeHaus = response.data.projects;
  })  

});