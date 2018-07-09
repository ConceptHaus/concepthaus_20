var app = angular.module('app', ['ngMessages','ngResource', 'RegistroController', 'RegistroService', 'isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
