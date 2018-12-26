/**
*  Module
*
* Description
*/
angular.module('VacantesController', ['app','ngMask','isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('VacantesController', function VacantesController($scope, $window, vacantes, Upload) {
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
                text: "Gracias por tu interes",
                confirmButtonText: 'Cerrar',
								confirmButtonColor: '#e73c30'
                // showCancelButton: true,
                // cancelButtonText: 'Subir otro ticket'
            }).then(function (result) {
							console.log(result);
                if (result) {
                    $window.location.href = "/";
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

	$scope.saveVacante = function(vacante,vacantesForm){
		console.log(vacante);
		swal({
				imageUrl: '../img/loader.gif',
				imageWidth: 150,
				imageAlt: 'Concept Haus',
				showConfirmButton: false
		})
		vacantes.saveVacante(vacante).then(function(res){
			swal({
							title:"Vacante creada correctamente",
							// text:"",
							confirmButtonText: 'Publicar otra vacante',
							confirmButtonColor: '#e73c30',
							showCancelButton: true,
							cancelButtonText: 'Cerrar'
					})
					.then((result)=>{
						console.log(result);
							if(result){
								$scope.vacantesForm.$setPristine();
		            $scope.vacantesForm.$setUntouched();
								$window.location.reload();
							}
					},(dismiss)=>{
						$window.location.href = '/vacantes';
					})
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

	$scope.getVacantesPostulados = function(){
		vacantes.getVacantesPostulados().then(function(res){
			$scope.vacantesPostulados = res.data;
			console.log($scope.vacantesPostulados);
		},function (err){
			console.log(err);
		})
	}

 $scope.getVacantesPostulados();
 $scope.getVacantes();
 $scope.getAreas();
});
