var app = angular.module('app', ['ngMessages','ngResource','ngFileUpload', 'RegistroController', 'RegistroService','VacantesService','VacantesController', 'isteven-multi-select'], function($interpolateProvider){
// 'angularUtils.directives.dirPagination','ngSanitize'
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
