var app = angular.module('app', ['ngMessages', 'ngResource', 'ngFileUpload', 'RegistroController', 'RegistroService', 'VacantesService', 'VacantesController', 'isteven-multi-select','ngCookies'], function ($interpolateProvider) {
// 'angularUtils.directives.dirPagination','ngSanitize'
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
	console.log('Inicia Angular');
	
	
});

