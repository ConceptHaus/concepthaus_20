var app = angular.module('app', ['ngMessages','ngResource', 'RegistroController', 'RegistroService'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});