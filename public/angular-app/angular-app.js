var app = angular.module('app', ['ngMessages','ngResource', 'RegistroController', 'RegistroService', 'isteven-multi-select', 'angularUtils.directives.dirPagination'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
