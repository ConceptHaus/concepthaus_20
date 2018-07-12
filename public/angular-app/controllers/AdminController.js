/**
*  Module
*
* Description
*/

angular.module('AdminController', ['app','ngMask','isteven-multi-select'], function($interpolateProvider) {
	$interpolateProvider.startSymbol('<%');
	$interpolateProvider.endSymbol('%>');
});

app.controller('AdminController', function AdminController($window, $scope, $filter, $http, AdminService) {
    $scope.sortType     = 'id_registro';
    $scope.sortReverse  = true;
		$scope.show = true;
    $scope.getdetails = function (id_socio, compra) {
        data = {'id_socio':id_socio,'status_compra':compra}
        // console.log(data);
        AdminService.postUpdateStatusCompra(id_socio, data).then(function(response){
            console.log(response);
        });
    }

    var getSolicitudes = function(){
        AdminService.getSolicitudes().then(function(res){
					$scope.show = false;
            $scope.registros = res.data;
            $scope.statusProceso = [];
            $scope.statusCheck = [];
            $scope.statusClose = [];
            $scope.statusCotizado = [];
						  // console.log(res);
            angular.forEach($scope.registros, function(value, key) {
                if(value.pivot_status.id_status == 1) {
                    $scope.statusProceso.push(value);
                }
                if(value.pivot_status.id_status == 2){
                    $scope.statusCheck.push(value);
                }
                if(value.pivot_status.id_status == 3){
                    $scope.statusClose.push(value);
                }
                if(value.pivot_status.id_status == 4){
                    $scope.statusCotizado.push(value);
                }
            });

        }, function(error){
            console.log('Error Solicitudes',error);
        });
    }
    getSolicitudes();

    var getSolicitudesUltimas = function(){
        AdminService.getSolicitudesUltimas().then(function(res){
            $scope.registrosLastest = res.data;
        }, function(error){
            console.log('Error Solicitudes',error);
        });
    }
    getSolicitudesUltimas();

    $scope.filterTableDate = function(fecha) {
        data = {'fecha_inicial':fecha.inicial,'fecha_final':fecha.final}
        AdminService.postFilterDate(data).then(function(response){
            $scope.registros = response.data;
            // console.log(response.data);
        }, function(error){
            console.log('Error Solicitudes filterdate',error);
        });
    }

     // ===================== Gráfica Semanal ====================
     var getGraficaSemanal = function(){
        var graficaData = [];
        $http.get('/api/v1/graficas_semanal').then(function(res){
            $scope.hoy = res.data.hoy;
            $scope.daysbefore = res.data.DaysBefore;
            var contactosSemanal = res.data;
            var countContactos = Object.keys(res.data).length;
            // console.log(Object.keys(res.data).length);
            var lunes =  _.filter(contactosSemanal,{'dia':'Monday'});
            var martes =  _.filter(contactosSemanal,{'dia':'Tuesday'});
            var miercoles =  _.filter(contactosSemanal,{'dia':'Wednesday'});
            var jueves =  _.filter(contactosSemanal,{'dia':'Thursday'});
            var viernes =  _.filter(contactosSemanal,{'dia':'Friday'});
            var sabado =  _.filter(contactosSemanal,{'dia':'Saturday'});
            var domingo =  _.filter(contactosSemanal,{'dia':'Sunday'});
            graficaData.push(lunes.length,martes.length,miercoles.length,jueves.length,viernes.length,sabado.length,domingo.length);
            // console.log('Semanal',graficaData);
            dataDailySalesChart = {
                labels: ['Lun', 'Mar', 'Mie', 'Jue', 'Vie', 'Sab', 'Dom'],
                series: [
                    graficaData

                ]
            };
            optionsDailySalesChart = {
                lineSmooth: Chartist.Interpolation.cardinal({
                    tension: 0
                }),
                low: 0,
                high: countContactos,
                chartPadding: {
                    top: 0,
                    right: 0,
                    bottom: 0,
                    left: 0
                },
            }
            var dailySalesChart = new Chartist.Line('#dailySalesChart', dataDailySalesChart, optionsDailySalesChart);
            md.startAnimationForLineChart(dailySalesChart);
        })
    }

    // ===================== Gráfica Mensual ====================
    var getGraficaMensual = function(){
        var graficaMes = [];
        $http.get('/api/v1/graficas_mensual').then(function(res){
            var contactos = res.data;
            var countContacts = Object.keys(res.data).length;
            var countContactMes = (countContacts+5);
            var enero = _.filter(contactos,{'mes':'01'});
            var febrero = _.filter(contactos,{'mes':'02'});
            var marzo = _.filter(contactos,{'mes':'03'});
            var abril = _.filter(contactos,{'mes':'04'});
            var mayo = _.filter(contactos,{'mes':'05'});
            var junio = _.filter(contactos,{'mes':'06'});
            var julio = _.filter(contactos,{'mes':'07'});
            var agosto = _.filter(contactos,{'mes':'08'});
            var septiembre = _.filter(contactos,{'mes':'09'});
            var octubre = _.filter(contactos,{'mes':'10'});
            var noviembre = _.filter(contactos,{'mes':'11'});
            var diciembre = _.filter(contactos,{'mes':'12'});

            graficaMes.push(enero.length,febrero.length,marzo.length,abril.length,mayo.length,junio.length,julio.length,
                            agosto.length,septiembre.length,octubre.length,noviembre.length,diciembre.length);

            // console.log('Mes',graficaMes);
            var dataEmailsSubscriptionChart = {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mai', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                series: [
                    graficaMes

                ]
            };
            var optionsEmailsSubscriptionChart = {
                axisX: {
                    showGrid: false
                },
                low: 0,
                high: countContactMes,
                chartPadding: {
                    top: 0,
                    right: 5,
                    bottom: 0,
                    left: 0
                }
            };
            var responsiveOptions = [
                ['screen and (max-width: 640px)', {
                    seriesBarDistance: 5,
                    axisX: {
                        labelInterpolationFnc: function(value) {
                            return value[0];
                        }
                    }
                }]
            ];
            var emailsSubscriptionChart = Chartist.Bar('#emailsSubscriptionChart', dataEmailsSubscriptionChart, optionsEmailsSubscriptionChart, responsiveOptions);

            //start animation for the Emails Subscription Chart
            md.startAnimationForBarChart(emailsSubscriptionChart);
        })
    }
    getGraficaSemanal();
    getGraficaMensual();


    $scope.Valued = function(registro){
        registro.new_status = 4;
        console.log(registro);
        AdminService.postStatus(registro)
            .then(function(data){
                console.log(data.data);
                jQuery('#modalValued').modal('hide');
                $window.location.reload();

            }, function(err){
                console.log(err);
            });
    };

    $scope.NoViable = function(registro){
        registro.new_status = 3;
        AdminService.postStatus(registro)
            .then(function(data){
                console.log(data.data);
                jQuery('#modalErrorStatus').modal('hide');
                $window.location.reload();

            }, function(err){
                console.log(err);
            });
    };

    $scope.NewSocio = function(registro){
        registro.new_status = 2;
        AdminService.postStatus(registro)
            .then(function(data){
                console.log(data.data);
                jQuery('#modalCheckStatus').modal('hide');
                $window.location.reload();
            }, function(err){
                console.log(err);
            });
    };

    $scope.saveMedioComment = function(medio){
        console.log(medio);
        AdminService.postMedio(medio)
            .then(function(data){
                $window.location.reload();
            }, function(err){
                console.log(err);
            });
    }

    // Eliminar lead
    $scope.deleteLead  = function(registro){
        $scope.id = registro.id_registro;
        console.log($scope.id);
        swal({
            title: '¿Deseas eliminar el lead No.' + $scope.id +'?',
            text: "Una vez borrado no podrá recuperar la información.",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: "Cancelar",
            confirmButtonText: 'Sí, eliminar'
        }).then((result) => {
            if (result) {
                AdminService.postDelete(registro).then(successRegister, errorRegister);
            }
        })
    }
    var successRegister = function(data){
        swal({
            text:'Gracias, tu lead ha sido eliminado.',
            imageUrl: '../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            icon: "success",
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
        setTimeout(function(){
            window.location.reload();
        }, 2500);
    }
    var errorRegister = function(errors){
        swal({
            text:'Algo salió mal al intentar eliminar la información del lead.',
            imageUrl: '../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
    }

    // Editar Lead
    $scope.editDataLead  = function(contacto){
        swal({
            imageUrl: '../../img/loader.gif',
            imageWidth: 150,
            imageAlt: 'Concept Haus',
            showConfirmButton: false
        })

        $scope.contacto.servicies = [];
        angular.forEach(contacto.outputServicies, function(value, key) {
            $scope.contacto.servicies.push(value.name);
        })

        AdminService.postEdit(contacto).then(successEditLead, errorEditLead);
    }
    var successEditLead = function(res){
        swal({
            text:'Lead actualizado.',
            imageUrl: '../../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            icon: "success",
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
        setTimeout(function(){
            window.location.reload();
        }, 2500);
    }
    var errorEditLead = function(errors){
        swal({
            text:'Algo salió mal en la actualización del Lead, vuelve a intentarlo.',
            imageUrl: '../../img/logo/concepthaus.svg',
            imageWidth: 210,
            imageAlt: 'Concept Haus',
            confirmButtonText:'Cerrar',
            confirmButtonColor: '#4a4f55',
            closeOnConfirm:false
        })
    }

    // Delete Servicies
    $scope.deleteServicie = function(servicio){
        console.log(servicio);
        AdminService.postDeleteServicie(servicio)
        .then(function(data){
            $window.location.reload();
        }, function(errors){
            console.log(errors);
        });
    };

    // Multiple Select
    $scope.listServicies = [
        { icon: "<img src=../../img/concept.png />", name: "Branding", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Diseño", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "3D", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Marketing Digital", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "SEO", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Marketing ATL", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Marketing BTL", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Evento", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Relaciones Públicas", ticked: false },
        { icon: "<img src=../../img/concept.png />", name: "Responsabilidad Social", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Interiorismo", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Producción Audiovisual", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Fotografía", ticked: false  },
        { icon: "<img src=../../img/concept.png />", name: "Varios", ticked: false  }
    ];

});
