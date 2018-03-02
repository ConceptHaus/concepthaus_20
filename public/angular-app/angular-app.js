var app = angular.module('app', ['ngMessages','ngResource', 'RegistroController', 'RegistroService','angularUtils.directives.dirPagination'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});