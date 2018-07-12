var app = angular.module('app', ['ngMessages','ngResource', 'RegistroController', 'RegistroService', 'isteven-multi-select'], function($interpolateProvider) {
// 'angularUtils.directives.dirPagination','ngSanitize'
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});
