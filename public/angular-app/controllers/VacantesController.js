/**
*  Module
*
* Description
*/
angular.module('VacantesController', ['app','ngMask','isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('VacantesController', function VacantesController($scope, vacantes, Upload) {
	$scope.areas = {};
	$scope.vacantes = {};

	$scope.savePostulado = function(postulado){
		console.log(postulado);
		swal({
				imageUrl: '../img/loader.gif',
				imageWidth: 150,
				imageAlt: 'Concept Haus',
				showConfirmButton: false
		});
		Upload.upload({
            url: '/createPostulado',
            data: postulado
        }).then(function(res){
					swal({
                title: "¡Todo bien!",
                text: "Tu ticket se ha registrado con éxito",
                confirmButtonText: 'Regresar a mi cuenta',
                showCancelButton: true,
                cancelButtonText: 'Subir otro ticket'
            }).then(function (result) {
                if (result.value) {
                    $window.location.href = "/home";
                }
            });
            console.log(res.data);
            $postulado = null;
				},function (err){
					swal({
                type: 'error',
                title: 'Oh no!, Algo salió mal.',
                text: err.data.error
            });
            console.log(err.data);
				})
	}

	$scope.saveVacante = function(vacante){
		console.log(vacante);
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

	$scope.getVacantes = function(){
		vacantes.getVacantes().then(function(res){
			$scope.vacantes = res.data;
			console.log($scope.vacantes);
		}, function (err){
			console.log(err);
		})
	}

	$scope.getAreas = function(){
		vacantes.getAreas().then(function(res){
			$scope.areas = res.data;
			console.log($scope.areas);
		}, function (err){
			console.log(err);
		})
	}
 $scope.getVacantes();
 $scope.getAreas();
});
