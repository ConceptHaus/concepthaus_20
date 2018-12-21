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
	$scope.savePostulado = function(postulado){
		swal({
				imageUrl: '../img/loader.gif',
				imageWidth: 150,
				imageAlt: 'Concept Haus',
				showConfirmButton: false
		})
	vacantes.createPostulado(postulado).then(function (res){
			swal({
	            title:"Enviado exitosamente",
	            text:"Tu mensaje ha sido enviado exitosamenete"
	            // confirmButtonText: 'Regresar a mi cuenta',
	            // showCancelButton: true,
	            // cancelButtonText: 'Subir otro ticket'
	        }).then((result)=>{
	            if(result.value){
	                $window.location.href="/";
	            }
	        })
	        console.log(res.data);
			}, function (err) {
					swal({
	            type:'error',
	            title:'Oh no!, Algo salió mal.',
	            text: err.data.error
	        })
			})
	}

	$scope.saveVacante = function(vacante){
		swal({
				imageUrl: '../img/loader.gif',
				imageWidth: 150,
				imageAlt: 'Concept Haus',
				showConfirmButton: false
		})
		vacantes.saveVacante(vacante).then(function(res){
			swal({
							title:"Enviado exitosamente",
							text:"Tu mensaje ha sido enviado exitosamenete",
							confirmButtonText: 'Cerrar',
							showCancelButton: true,
							cancelButtonText: 'Publicar otra vacante'
					})
					// .then((result)=>{
					// 		if(result.value){
					// 				$window.location.href="/";
					// 		}
					// })
					console.log(res.data);
		}, function(err){
			swal({
					type:'error',
					title:'Oh no!, Algo salió mal.',
					text: err.data.error
			})
		})
	}
});
