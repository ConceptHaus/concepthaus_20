/**
*  Module
*
* Description
*/
angular.module('VacantesController', ['app','ngMask','isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('VacantesController', function VacantesController($scope, vacantes) {
	
});
